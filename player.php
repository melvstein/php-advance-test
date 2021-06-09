<?php


$database = 'nba2019';
require_once('vendor/autoload.php');
require_once('include/utils.php');
require_once('classes/dbh.php');
require_once('classes/Nba.php');

$nba = new Nba;

$player = $nba->player($_GET['id']);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <title>NBA PLAYERS</title>
</head>
<body>
<div class="max-w-7xl mx-auto py-20">
<h1 class="py-4 font-semibold text-7xl">
    NBA PLAYER (<?= $player["player_name"]; ?>)
</h1>
<div class="space-y-2">
    <h1 class="text-xl font-semibold">Export to:</h1>
    <div class="py-4">
        <a href="export.php?type=playerstats&player=<?= $player["player_name"]; ?>&format=xml" class="bg-blue-300 text-white px-4 py-2 rounded">XML</a>
        <a href="export.php?type=playerstats&player=<?= $player["player_name"]; ?>&format=json" class="bg-blue-300 text-white px-4 py-2 rounded">JSON</a>
    </div>
</div>
<div class="flex flex-col">
  <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
      <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
        <table class="min-w-full divide-y divide-gray-200">
          <thead class="bg-gray-50">
            <tr>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Player Name
              </th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Full Team Name
              </th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Age
              </th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Player Number
              </th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Position
              </th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                3 Pointers Made Percent
              </th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Number Of 3 Pointers Made
              </th>
            </tr>
          </thead>
          <tbody class="bg-white divide-y divide-gray-200">
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <?= $player["player_name"]; ?>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <?= $player["full_team_name"]; ?>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <?= $player["age"]; ?>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <?= $player["player_number"]; ?>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <?= $player["position"]; ?>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <?= $player["3_pointers_made_percent"]; ?>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <?= $player["number_of_3_pointers_made"]; ?>
                    </td>
                </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
</div>
</body>
</html>