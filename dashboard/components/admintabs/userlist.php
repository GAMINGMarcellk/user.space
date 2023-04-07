            <?php
            // pagination
            if (isset($_GET['p'])) {
                $p = $_GET['p'];
            } else {
                $p = 1;
            }
            $start_from = ($p-1)*20;

            $num_per_page = 20;
            $user_list = mysqli_query($mysqli, "SELECT * FROM `users` ORDER BY `id` ASC limit $start_from,$num_per_page");
            $total_users = mysqli_num_rows($user_list);
            ?>
            <div class="bg-gray-900 p-3 shadow rounded-md">
                <h2 class="text-lg font-bold leading-7 text-white sm:truncate sm:text-lg sm:tracking-tight">Users</h2>
                <div class="mt-2 relative overflow-x-auto rounded">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 rounded">
                        <thead class="text-xs text-white uppercase bg-indigo-600">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Username
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Created
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Page URL
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Admin
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Verified
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Actions
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($row = mysqli_fetch_array($user_list)) { ?>
                            <tr class="border-b dark:border-gray-700">
                                <th scope="row" class="px-6 py-4 font-medium whitespace-nowrap flex">
                                    <?php echo htmlspecialchars($row["username"]); ?>
                                </th>
                                <td class="px-6 py-4">
                                    <?php echo htmlspecialchars(timeago(strtotime($row["created_at"]))); ?>
                                </td>
                                <td class="px-6 py-4">
                                    <a href="/@<?php echo htmlspecialchars($row["pageurl"]); ?>" target="_blank" class="font-medium text-indigo-600 hover:text-indigo-500 hover:underline"><?php echo htmlspecialchars($row["pageurl"]); ?></a>
                                </td>
                                <td class="px-6 py-4">
                                    <?php if ($row['admin'] == 1) { ?>
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                                            <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z" clip-rule="evenodd" />
                                        </svg>
                                    <?php } else { ?>
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                                            <path d="M6.28 5.22a.75.75 0 00-1.06 1.06L8.94 10l-3.72 3.72a.75.75 0 101.06 1.06L10 11.06l3.72 3.72a.75.75 0 101.06-1.06L11.06 10l3.72-3.72a.75.75 0 00-1.06-1.06L10 8.94 6.28 5.22z" />
                                        </svg>
                                    <?php } ?>
                                </td>
                                <td class="px-6 py-4">
                                    <?php if ($row['verified'] == 1) { ?>
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                                            <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z" clip-rule="evenodd" />
                                        </svg>
                                    <?php } else { ?>
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                                            <path d="M6.28 5.22a.75.75 0 00-1.06 1.06L8.94 10l-3.72 3.72a.75.75 0 101.06 1.06L10 11.06l3.72 3.72a.75.75 0 101.06-1.06L11.06 10l3.72-3.72a.75.75 0 00-1.06-1.06L10 8.94 6.28 5.22z" />
                                        </svg>
                                    <?php } ?>
                                </td>
                                <td class="px-6 py-4">
                                    tbd
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="bg-gray-900 p-3 shadow rounded-md">
                <div class='flex items-center justify-between'>
                    <div class="hidden sm:flex sm:flex-1 sm:items-center sm:justify-between">
                        <div>
                            <?php
                                $ulp = mysqli_query($mysqli, "SELECT * FROM `users` ORDER BY `id` ASC");
                                $tul = mysqli_num_rows($ulp);
                                $start = ($start_from + 1);
                                $end = ($start_from + $num_per_page);
                                if ($end > $tul) { $end = $tul; }
                            ?>
                            <p class="text-sm text-gray-400">
                                Showing
                                <span class="font-medium"><?php echo $start; ?></span>
                                to
                                <span class="font-medium"><?php echo $end; ?></span>
                                of
                                <span class="font-medium"><?php echo $tul; ?></span>
                                results
                            </p>
                        </div>
                    </div>
                    <div>
                        <nav class="isolate inline-flex -space-x-px rounded-md shadow-sm" aria-label="Pagination">
                        <?php
                            $ul = mysqli_query($mysqli, "SELECT * FROM `users` ORDER BY `id` ASC");
                            $tu = mysqli_num_rows($ul);
                            $pages = ceil($tu / $num_per_page);

                            if ($p>1)
                            {
                                echo "
                                <a href='?p=".($p-1)."' class='relative inline-flex items-center rounded-l-md border border-indigo-600 px-2 py-2 text-sm font-medium text-indigo-600 hover:text-white hover:bg-indigo-600 focus:z-20'>
                                    <span class='sr-only'>Previous</span>
                                    <svg class='h-5 w-5' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 20 20' fill='currentColor' aria-hidden='true'>
                                        <path fill-rule='evenodd' d='M12.79 5.23a.75.75 0 01-.02 1.06L8.832 10l3.938 3.71a.75.75 0 11-1.04 1.08l-4.5-4.25a.75.75 0 010-1.08l4.5-4.25a.75.75 0 011.06.02z' clip-rule='evenodd' />
                                    </svg>
                                </a>
                                ";
                            }
                            else
                            {
                                echo "
                                <a style='cursor: not-allowed;' class='relative inline-flex items-center rounded-l-md border border-indigo-600 px-2 py-2 text-sm font-medium text-indigo-600 opacity-50 focus:z-20'>
                                    <span class='sr-only'>Previous</span>
                                    <svg class='h-5 w-5' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 20 20' fill='currentColor' aria-hidden='true'>
                                        <path fill-rule='evenodd' d='M12.79 5.23a.75.75 0 01-.02 1.06L8.832 10l3.938 3.71a.75.75 0 11-1.04 1.08l-4.5-4.25a.75.75 0 010-1.08l4.5-4.25a.75.75 0 011.06.02z' clip-rule='evenodd' />
                                    </svg>
                                </a>
                                ";
                            }

                            for ($i=1; $i <= $pages; $i++)
                            {
                                $active = 'text-indigo-600 hover:bg-indigo-600 hover:text-white';

                                if ($p == $i) {
                                    $active = 'bg-indigo-600 hover:bg-indigo-700 text-white';
                                }
                                echo "<a href='?p=".$i."' class='relative inline-flex items-center border border-indigo-600 px-4 py-2 text-sm font-medium ".$active." focus:z-20'>".$i."</a>";
                            }

                            if ($p < $pages)
                            {
                                echo "
                                <a href='?p=".($p+1)."' class='relative inline-flex items-center rounded-r-md border border-indigo-600 px-2 py-2 text-sm font-medium text-indigo-600 hover:text-white hover:bg-indigo-600 focus:z-20'>
                                    <span class='sr-only'>Next</span>
                                    <svg class='h-5 w-5' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 20 20' fill='currentColor' aria-hidden='true'>
                                        <path fill-rule='evenodd' d='M7.21 14.77a.75.75 0 01.02-1.06L11.168 10 7.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z' clip-rule='evenodd' />
                                    </svg>
                                </a>
                                ";
                            }
                            else
                            {
                                echo "
                                <a  style='cursor: not-allowed;' class='opacity-50 relative inline-flex items-center rounded-r-md border border-indigo-600 px-2 py-2 text-sm font-medium text-indigo-600 focus:z-20'>
                                    <span class='sr-only'>Next</span>
                                    <svg class='h-5 w-5' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 20 20' fill='currentColor' aria-hidden='true'>
                                        <path fill-rule='evenodd' d='M7.21 14.77a.75.75 0 01.02-1.06L11.168 10 7.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z' clip-rule='evenodd' />
                                    </svg>
                                </a>
                                ";
                            }
                        ?>
                        </nav>
                    </div>
                </div>
            </div>