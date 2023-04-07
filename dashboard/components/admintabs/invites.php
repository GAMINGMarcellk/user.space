<?php
$invite_list = mysqli_query($mysqli, "SELECT * FROM `invites` WHERE used=0");
?>

<div class="bg-gray-900 p-3 shadow rounded-md">
    <h2 class="text-lg font-bold leading-7 text-white sm:truncate sm:text-lg sm:tracking-tight">Invites</h2>
    <div class="mt-2 relative overflow-x-auto rounded">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 rounded">
            <thead class="text-xs text-white uppercase bg-indigo-600">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Code
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Link
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_array($invite_list)) { ?>
                    <tr class="border-b dark:border-gray-700">
                        <td class="px-6 py-4">
                            <?php echo htmlspecialchars($row["code"]); ?>
                        </td>
                        <td class="px-6 py-4">
                            <a class="font-medium text-indigo-600 hover:text-indigo-500 hover:underline" target="_blank">
                                https://user.space/dashboard/register.php?invite=<?php echo htmlspecialchars($row["code"]); ?>
                            </a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
<div class="bg-gray-900 p-3 shadow rounded-md">
    <button onclick="window.location='components/admintabs/functions.php?gencode'" class="group relative flex justify-center rounded-md border border-transparent bg-indigo-600 hover:bg-indigo-700 py-2 px-4 text-sm font-medium text-white">
        Generate
    </button>
</div>