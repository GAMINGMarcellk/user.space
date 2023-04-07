            <?php
            $uid = $_SESSION["id"];
            $custom_links = mysqli_query($mysqli, "SELECT * FROM `customlinks` WHERE userid='{$uid}'");
            ?>
            <div class="flex">
                <button type="button" data-modal-target="defaultModal" data-modal-toggle="defaultModal" class="flex items-center rounded-md bg-green-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-green-700 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-green-600">
                    <span aria-hidden="true" class="mr-1">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                            <path d="M12.232 4.232a2.5 2.5 0 013.536 3.536l-1.225 1.224a.75.75 0 001.061 1.06l1.224-1.224a4 4 0 00-5.656-5.656l-3 3a4 4 0 00.225 5.865.75.75 0 00.977-1.138 2.5 2.5 0 01-.142-3.667l3-3z" />
                            <path d="M11.603 7.963a.75.75 0 00-.977 1.138 2.5 2.5 0 01.142 3.667l-3 3a2.5 2.5 0 01-3.536-3.536l1.225-1.224a.75.75 0 00-1.061-1.06l-1.224 1.224a4 4 0 105.656 5.656l3-3a4 4 0 00-.225-5.865z" />
                        </svg>
                    </span>

                    Create link
                </button>
            </div>
            <?php if (!empty($msgg)) { ?>
                <div class="border <?php echo $classess; ?> px-4 py-3 rounded relative" role="alert">
                    <span class="block sm:inline"><?php echo $msgg; ?></span>
                </div>
            <?php } ?>
            <?php while ($r = mysqli_fetch_array($custom_links)) { ?>
                <div class="bg-gray-900 p-3 rounded shadow text-gray-400 text-sm shadow group">
                    <div>
                        <span class="relative flex flex-row justify-between items-center rounded bg-gray-900 w-full text-sm leading-tight">
                            <div class="flex items-center justify-center">
                                <div class="h-16 w-16 rounded bg-gray-800 bg-opacity-50 flex items-center justify-center">
                                    <img class="rounded" src="https://www.google.com/s2/favicons?domain=<?php echo htmlspecialchars($r["link"]) ?>&amp;sz=24">
                                </div>
                                <div class="flex flex-col mx-4">
                                    <span title="<?php echo htmlspecialchars($r["linktitle"]) ?>" class="text-[16px] text-gray-400"><?php echo htmlspecialchars($r["linktitle"]) ?></span>
                                    <span title="https://<?php echo htmlspecialchars($r["link"]) ?>" class="text-[14px] mt-1 text-gray-700 whitespace-nowrap truncate w-[175px] xs:w-[220px] sm:w-[275px] md:w-[340px] lg:w-[400px]"><?php echo htmlspecialchars($r["link"]) ?></span>
                                </div>
                            </div>
                            <button class="bg-transparent p-1.5 hover:bg-gray-700/50 rounded text-sm text-red-700 absolute right-0 cursor-pointer">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-8 h-4">
                                    <path fill-rule="evenodd" d="M8.75 1A2.75 2.75 0 006 3.75v.443c-.795.077-1.584.176-2.365.298a.75.75 0 10.23 1.482l.149-.022.841 10.518A2.75 2.75 0 007.596 19h4.807a2.75 2.75 0 002.742-2.53l.841-10.52.149.023a.75.75 0 00.23-1.482A41.03 41.03 0 0014 4.193V3.75A2.75 2.75 0 0011.25 1h-2.5zM10 4c.84 0 1.673.025 2.5.075V3.75c0-.69-.56-1.25-1.25-1.25h-2.5c-.69 0-1.25.56-1.25 1.25v.325C8.327 4.025 9.16 4 10 4zM8.58 7.72a.75.75 0 00-1.5.06l.3 7.5a.75.75 0 101.5-.06l-.3-7.5zm4.34.06a.75.75 0 10-1.5-.06l-.3 7.5a.75.75 0 101.5.06l.3-7.5z" clip-rule="evenodd" />
                                </svg>
                            </button>
                        </span>
                    </div>
                </div>
            <?php } ?>
            <div id="defaultModal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full">
                <div class="relative w-full h-full max-w-2xl md:h-auto">
                    <!-- Modal content -->
                    <div class="relative bg-gray-900 rounded">
                        <!-- Modal header -->
                        <div class="flex items-start justify-between p-6">
                            <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                Create link
                            </h3>
                        </div>
                        <form action="manage.php" method="POST">
                            <!-- Modal body -->
                            <div class="p-6">
                                <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                                    <div class="relative flex mt-2">
                                        <label for="insertcustomurltitle" class="sr-only">insertcustomurltitle</label>
                                        <input id="insertcustomurltitle" name="insertcustomurltitle" type="insertcustomurltitle" autocomplete="insertcustomurltitle" required class="bg-gray-800 rounded relative block w-full appearance-none mb-2 border border-transparent px-3 py-2 text-white placeholder-gray-400 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" placeholder="My Website">
                                    </div>
                                    <div class="relative flex mt-2">
                                        <label for="insertcustomurllink" class="sr-only">insertcustomurllink</label>
                                        <div class="bg-gray-800 rounded relative block appearance-none mb-2 rounded border border-transparent px-3 py-2 text-gray-400 placeholder-gray-400 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm">
                                            <span>https://</span>
                                        </div>
                                        <input id="insertcustomurllink" name="insertcustomurllink" type="insertcustomurllink" autocomplete="insertcustomurllink" required class="bg-gray-800 rounded relative block w-full appearance-none mb-2 border border-transparent px-3 py-2 text-white placeholder-gray-400 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" placeholder="example.com">
                                    </div>
                                </p>
                            </div>
                            <!-- Modal footer -->
                            <div class="flex items-center p-6">
                                <button type="submit" name="updatecustomlinks" class="group relative flex w-full justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                                    Save
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.3/flowbite.min.js"></script>