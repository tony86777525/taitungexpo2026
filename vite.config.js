import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import glob from 'fast-glob';
import path from 'path';
import tailwindcss from '@tailwindcss/vite';

export default defineConfig({
    plugins: [
        laravel({
            input: glob.sync(['resources/scss/**/*.scss', 'resources/js/**/*.js']),
            refresh: true,
        }),
        tailwindcss(),
    ],
    server: {
        watch: {
            ignored: ['**/storage/framework/views/**'],
        },
    },
    build: {
        rollupOptions: {
            input: glob.sync(['resources/scss/**/*.scss', 'resources/js/**/*.js']),
            output: {
                entryFileNames: `js/[hash:16].js`,
                chunkFileNames: `js/[hash:16].js`,
                assetFileNames: (assetInfo) => {
                    if (/\.(gif|jpeg|jpg|png|svg|webp| )$/.test(assetInfo.name)) {
                        return 'images/[hash:16].[ext]';
                    }

                    if (/\.css$/.test(assetInfo.name)) {
                        return 'css/[hash:16].[ext]';
                    }
                    return '[hash:16].[ext]';
                },
            },
        },
    },
    resolve: {
        alias: {
            '@/': path.join(__dirname, './resources/'),
        },
    },
});
