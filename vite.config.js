import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";
import tailwindcss from "@tailwindcss/vite";
import vue from "@vitejs/plugin-vue";
import fs from "fs";

export default defineConfig({
    plugins: [
        laravel({
            input: ["resources/css/app.css", "resources/js/app.js"],
            refresh: true,
        }),
        tailwindcss(),
        vue(),
    ],
    server: {
        https: {
            key: fs.readFileSync(
                "A:/TUGAS UJIKOM/dashboard_kasir/.ssl/server.key"
            ),
            cert: fs.readFileSync(
                "A:/TUGAS UJIKOM/dashboard_kasir/.ssl/server.crt"
            ),
        },
    },
});
