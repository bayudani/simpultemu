<?php

$file = 'c:/Users/USER/Herd/simpultemu_kami/app/Http/Controllers/ThemeController.php';
$content = file_get_contents($file);

$replacements = [
    "(\$isDarkElegance ? 'Lisa Salsabila, S.Ked.'" => "(\$isDarkElegance ? 'Azalia Fasya'",
    "(\$isDarkElegance ? 'Lisa'" => "(\$isDarkElegance ? 'Azalia'",
    "(\$isDarkElegance ? 'Putri pertama dari Bpk. Dr. Bambang & Ibu Anita'" => "(\$isDarkElegance ? 'Putri dari Bapak Ayah Azalia & Ibu Ibu Azalia'",
    "(\$isDarkElegance ? 'lisa.salsabila'" => "(\$isDarkElegance ? 'diastaufikr'",
    "(\$isDarkElegance ? 'Theo Pratama'" => "(\$isDarkElegance ? 'Dias Taufik'",
    "(\$isDarkElegance ? 'Theo & Lisa'" => "(\$isDarkElegance ? 'Azalia & Dias'",
    "(\$isDarkElegance ? 'Kami yang berbahagia, Theo & Lisa beserta Keluarga Besar'" => "(\$isDarkElegance ? 'Kami yang berbahagia, Azalia & Dias beserta Keluarga Besar'",
    "(\$isDarkElegance ? 'Lisa Salsabila'" => "(\$isDarkElegance ? 'Azalia Fasya'",
];

foreach ($replacements as $search => $replace) {
    if (str_contains($content, $search)) {
        $content = str_replace($search, $replace, $content);
        echo "Replaced: $search\n";
    } else {
        echo "Not found: $search\n";
    }
}

file_put_contents($file, $content);
echo "ThemeController updated successfully!\n";
