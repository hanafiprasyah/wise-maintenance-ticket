import preset from "../../../../vendor/filament/filament/tailwind.config.preset";

export default {
    presets: [preset],
    content: [
        "./app/Filament/**/*.php",
        "./resources/views/filament/**/*.blade.php",
        "./vendor/filament/**/*.blade.php",
        "./vendor/jaocero/activity-timeline/resources/views/**/*.blade.php",
        "./vendor/awcodes/overlook/resources/**/*.blade.php",
        "./vendor/awcodes/filament-badgeable-column/resources/**/*.blade.php",
        "./vendor/awcodes/filament-quick-create/resources/**/*.blade.php",
    ],
};
