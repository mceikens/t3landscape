![T3Landscape Logo](./packages/sitepackage/Resources/Public/Logos/T3Landscape-Logo.png)

# T3Landscape

**T3Landscape** is an open platform for everyone who wants to explore, understand, and actively shape the TYPO3 ecosystem. From newcomers to long time community members and experts, T3Landscape provides a central place to get a structured and transparent overview of the entire TYPO3 landscape.

As an open source, community driven project, T3Landscape focuses on the neutral and transparent classification of key parts of the TYPO3 ecosystem. This includes community initiatives, extensions, agencies, partners, trainers, and other relevant actors. All evaluations are based on clearly defined criteria that are created and maintained by the community itself. The goal is not to create rankings, but to provide orientation, comparability, and a shared reference framework.

For experts and experienced community members, T3Landscape offers clear added value. It helps identify trends, focus areas, and gaps within the ecosystem, supports strategic decision making, and creates a common language for discussions about quality, sustainability, and future development. At the same time, it makes long term contributions, engagement, and expertise within the TYPO3 community more visible.

T3Landscape enables a fast and effective overview while consistently linking to the original sources. This ensures transparency and allows users to dive deeper into the topics that matter most to them, based on reliable and verifiable information.

As a true community project, T3Landscape lives from participation. Everyone is invited to contribute content, help define and improve evaluation criteria, and actively shape the platform. Together, we are building an open, independent, and sustainable knowledge landscape for the TYPO3 ecosystem.


## Project Goals

T3Landscape aims to make the complexity of the TYPO3 ecosystem transparent and understandable. Instead of subjective ratings or marketing-driven presentations, the project focuses on:

- clearly defined and openly documented criteria
- reproducible and verifiable information
- neutrality towards commercial and non-commercial actors
- long-term maintainability and openness

The project explicitly does not aim to be a ranking or review platform, but rather an orientation and knowledge base for informed decision-making within the TYPO3 community.


## Architecture Overview

T3Landscape is built on a containerized infrastructure that is intentionally kept lean and avoids abstracting development wrappers such as ddev. The goal is maximum transparency, full control over all components, and a development environment that closely resembles production setups.

The application itself is based on TYPO3 and is designed to run consistently in local, CI/CD, and server environments.

More details and upcoming features will be announced soon.


## Used Containers

The following containers are used for development and operation:

### PHP / TYPO3 Runtime

- Repository: [https://github.com/mceikens/typo3-base-prod-container-php-fpm-84](https://github.com/mceikens/typo3-base-prod-container-php-fpm-84)

- Registry Image: `registry.mceikens-infra.de/typo3-foss/php-fpm-84-dev:2.3.0`

This container provides a production-ready PHP-FPM environment for TYPO3.
When using it, the instructions and conventions defined in the repository must be followed and applied (e.g. volumes, user mapping, environment variables).

### Web Server
- Image: nginx:1.25.2-alpine

The NGINX container handles HTTP delivery and forwards PHP requests to PHP-FPM. The configuration is intentionally minimal and optimized for TYPO3.

### Mail Testing
- Image: axllent/mailpit

Mailpit is used for local development and testing to capture outgoing emails and make them visible without relying on external mail infrastructure.

### Key-Value Store

- Image: valkey/valkey:9.0.2-alpine

Valkey is used as a Redis-compatible key-value store, for example for caching or queue-based functionality within TYPO3.

# Why No ddev?

The decision to not use ddev is intentional:
- full control over the infrastructure
- no additional abstraction layers
- better understanding of the underlying components
- closer alignment with production environments

T3Landscape targets users who either already have or intentionally want to build up a solid understanding of Docker-based setups.

## Development Setup

The concrete startup and configuration logic (e.g. via docker-compose) depends on the project setup and should closely follow the guidelines of the used container images.

## General recommendations:

- separate volumes for persistent data (TYPO3 fileadmin, var, database, etc.)
- clearly document all environment variables
- version control all configuration files and avoid changes inside running containers

## Contributing

T3Landscape thrives on community contributions. Contributions are very welcome in areas such as:

- adding and maintaining content
- defining and refining evaluation criteria
- technical improvements and refactoring
- documentation and examples

When contributing, please ensure:
- a factual and neutral tone
- transparent sources and references
- clear reasoning behind assumptions and decisions

Additional contribution guidelines can be added as the project evolves.

## License & Open Source

T3Landscape is an open-source project. Its goal is to provide a sustainable, independent platform in service of the TYPO3 community.

Licensing information and legal details are documented within the project repository.

## Publisher

- **MCEikens**
    - Initiator and publisher of the T3Landscape project
    - Responsible for the initial concept, technical foundation, and infrastructure
    - Acts as a neutral facilitator for community-driven development
    - Homepage: [MCEikens.de](https://www.mceikens.de)