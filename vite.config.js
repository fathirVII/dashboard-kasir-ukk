import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";
import tailwindcss from "@tailwindcss/vite";
import fs from "fs";

export default defineConfig({
    plugins: [
        laravel({
            input: ["resources/css/app.css", "resources/js/app.js"],
            refresh: true,
        }),
        tailwindcss(),
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
    // },
});
