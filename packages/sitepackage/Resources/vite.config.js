import { defineConfig } from 'vite'
import resolve from '@rollup/plugin-node-resolve';
import commonjs from '@rollup/plugin-commonjs';
import terser from '@rollup/plugin-terser';
import copy from 'rollup-plugin-copy';

export default defineConfig({
    build: {
        manifest: true,
        minify: true,
        sourcemap: true,
        cssMinify: true,
        assetsDir: "",
        rollupOptions: {
            input: "./Private/Assets/JavaScripts/app.js",
            output: {
                dir: "./Public/assets/build",
                format: "esm",
                name: "app",
                plugins: [
                    resolve(),
                    commonjs(),
                    terser(),
                ],
                entryFileNames: '[name].js',
                assetFileNames: '[name].css'
            }
        },
    },
    plugins: [
        copy({
            targets: [
                {
                    src: './node_modules/bootstrap-icons/font/fonts/',
                    dest: './Public/assets'
                },
                {
                    src: './Private/Assets/StyleSheets/fonts',
                    dest: './Public/assets'
                },
                {
                    src: './Private/Assets/Statics',
                    dest: './Public/assets'
                }
            ]
        })
    ]
})