import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";
import tailwindcss from "@tailwindcss/vite";
import legacy from "@vitejs/plugin-legacy";
import fs from "fs";

export default defineConfig({
    plugins: [
        laravel({
            input: ["resources/css/app.css", "resources/js/export.js"],
            refresh: true,
        }),
        tailwindcss(),
        legacy({
            targets: ["defaults", "not IE 11"],
        }),
    ],

    // server: {
    //     https: {
    //         key: fs.readFileSync(
    //             "A:/TUGAS UJIKOM/dashboard_kasir/storage/ssl/server.key"
    //         ),
    //         cert: fs.readFileSync(
    //             "A:/TUGAS UJIKOM/dashboard_kasir/storage/ssl/server.crt"
    //         ),
    //     },
    //     host: 'dashboard_kasir.test',
    // },
});
