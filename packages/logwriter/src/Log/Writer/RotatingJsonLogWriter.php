<?php

namespace MCEikens\LogWriter\Log\Writer;

use Monolog\Formatter\JsonFormatter;
use Monolog\Handler\RotatingFileHandler;
use Monolog\Level;
use Monolog\LogRecord;
use Psr\Log\LogLevel;
use TYPO3\CMS\Core\Log\Writer\AbstractWriter;
use \TYPO3\CMS\Core\Log\LogRecord as TYPO3LogRecord;

class RotatingJsonLogWriter extends AbstractWriter
{
    private string $logFileName = '';
    private string $interval = '';
    private int $maxFiles = 1;
    private string $channel = '';

    private ?RotatingFileHandler $rotatingFileHandler = null;

    public function __construct(array $options = [])
    {
        parent::__construct([]);
        $this->setLogFile($options['logFile']);
        $this->setInterval($options['interval']);
        $this->setMaxFiles($options['maxFiles']);
        $this->setChannel($options['channel']);
    }

    public function setLogFile(string $fileName): void
    {
        $this->logFileName = $fileName;
    }

    public function setMaxFiles(int $maxFiles): void
    {
        $this->maxFiles = $maxFiles;
    }

    public function setInterval(string $interval): void
    {
        $this->interval = $interval;
    }

    public function setChannel(string $channel): void
    {
        $this->channel = $channel;
    }

    private function createLogFile(): void
    {
        $this->rotatingFileHandler = new RotatingFileHandler(
            $this->logFileName,
            $this->maxFiles,
            dateFormat: $this->interval
        );
        $this->rotatingFileHandler->setFormatter(new JsonFormatter());
    }

    public function writeLog(TYPO3LogRecord $record): void
    {
        $this->createLogFile();

        $logLevel = $this->getLogLevel($record);
        $message = $this->buildLogMessage($record);

        $logRecord = new LogRecord(
            new \DateTimeImmutable(),
            $this->channel,
            $logLevel,
            $message,
            $record->getData()
        );

        $this->rotatingFileHandler->handle($logRecord);
    }

    private function buildLogMessage(TYPO3LogRecord $record): string
    {
        $data = '';
        $context = $record->getData();
        $message = $record->getMessage();
        if (!empty($context)) {
            if (isset($context['exception']) && $context['exception'] instanceof \Throwable) {
                $message .= $this->formatException($context['exception']);
                $context['exception'] = (string)$context['exception'];
            }
            $data = '- ' . json_encode($context, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
        }

        return sprintf(
            '%s [%s] request="%s" component="%s": %s %s',
            date('r', (int)$record->getCreated()),
            strtoupper($record->getLevel()),
            $record->getRequestId(),
            $record->getComponent(),
            $this->interpolate($message, $context),
            $data
        );
    }

    private function getLogLevel(TYPO3LogRecord $record): Level
    {
        return match ($record->getLevel()) {
            LogLevel::DEBUG => Level::Debug,
            LogLevel::INFO => Level::Info,
            LogLevel::NOTICE => Level::Notice,
            LogLevel::ALERT => Level::Alert,
            LogLevel::WARNING => Level::Warning,
            LogLevel::ERROR => Level::Error,
            LogLevel::CRITICAL => Level::Critical,
            LogLevel::EMERGENCY => Level::Emergency,
            default => throw new \Exception('Invalid log level: ' . $record->getLevel()),
        };
    }
}