<?php
require './vendor/autoload.php';

use Symfony\Component\Console\Helper\ProgressBar;
use Symfony\Component\Console\Output\ConsoleOutput;
use Symfony\Component\Console\Formatter\OutputFormatter;
use Symfony\Component\Console\Formatter\OutputFormatterStyle;
use Symfony\Component\Console\Style\SymfonyStyle;


$output = new ConsoleOutput();
$output->setFormatter(new OutputFormatter(true));

$output->writeln(
    'Importing <comment>console</comment> is yellow, <info>foo</info>, <question>foo</question>, <error>foo</error>'
);

$outputStyle = new OutputFormatterStyle('red', '#ff0', ['bold', 'blink']);
$output->getFormatter()->setStyle('fire', $outputStyle);
$output->writeln('<fire>foo</>');

// Magic happens here.
$rows = 27000;
$progressBar = new ProgressBar($output, $rows);
$progressBar->setBarCharacter('<fg=magenta>=</>');

$progressBar->setFormat(
            "%current%/%max% [%bar%] %percent:3s%%
            \n Working 🛠: %elapsed:-2s% || ETA ⏳: %remaining:-2s% || Mem 💾: %memory:-2s% "
        );


$output->writeln("\n Starting Item Importer.. \n");


// Set a moving. 🍺 
$progressBar->setProgressCharacter("\xF0\x9F\x8D\xBA");

for ($i = 0; $i<$rows; $i++) {
    // Your beautiful code here.
    usleep(500);

    $progressBar->advance();
}

$progressBar->finish();


$output->writeln("\n \n All items has been imported! \n");