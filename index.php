<?php


$database = 'nba2019';
require_once('vendor/autoload.php');
require_once('include/utils.php');
require_once('classes/dbh.php');
require_once('classes/Nba.php');

$nba = new Nba;

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
    NBA PLAYERS
</h1>
<div>
</div>
<div class="flex flex-col">
  <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
      <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
        <table class="min-w-full divide-y divide-gray-200">
          <thead class="bg-gray-50">
            <tr>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Team Code
              </th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Number
              </th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Name
              </th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Pos
              </th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Height
              </th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Weight
              </th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                DOB
              </th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Nationality
              </th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Years Exp
              </th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                College
              </th>
              <th scope="col" class="relative px-6 py-3">
                <span class="sr-only">Edit</span>
              </th>
            </tr>
          </thead>
          <tbody class="bg-white divide-y divide-gray-200">
        <?php
            foreach($nba->players() as $player) {
        ?>
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <?= $player["team_code"]; ?>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <?= $player["number"]; ?>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <a href="player.php?id=<?= $player["id"]; ?>" class="text-blue-500"><?= $player["name"]; ?></a>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <?= $player["pos"]; ?>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <?= $player["height"]; ?>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <?= $player["weight"]; ?>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <?= $player["dob"]; ?>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <?= $player["nationality"]; ?>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <?= $player["years_exp"]; ?>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <?= $player["college"]; ?>
                    </td>
                </tr>
        <?php
            }
        ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

</div>

</body>
</html>