<?php

echo "Total criteria: ";

$total_criteria = trim(fgets(STDIN));
$criterias = [];

for ($i=0; $i < $total_criteria; $i++) { 
    echo "\nName: ";
    $name = trim(fgets(STDIN));

    echo "Rank: ";
    $rank = trim(fgets(STDIN));
    $criterias[] = [
        "name" => $name,
        "rank" => $rank
    ];
}

print_r($criterias);


// Sorting by rank - ascending
usort($criterias, function($a, $b) {
    return $a["rank"] <=> $b["rank"];
});


echo "RANKING PROCESS" . PHP_EOL;
foreach ($criterias as &$c) {
    $partial_harmonic_sum = 0;
    for ($i=$c["rank"]; $i <= $total_criteria; $i++) { 
        $partial_harmonic_sum += 1 / $i;
    }
    $c["weight"] = 1 / $total_criteria * $partial_harmonic_sum;
}



echo "Result: " . PHP_EOL;
print_r($criterias);