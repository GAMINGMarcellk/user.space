<div class="bg-gray-900 p-3 shadow rounded-md">
                <h2 class="text-lg font-bold leading-7 text-white sm:truncate sm:text-lg sm:tracking-tight">Discord banner</h2>
                <p class="text-sm text-gray-400">
                    You must join
                    <a href="https://discord.com/invite/discord-status-banners-266585560125014017" target="_blank" class="font-medium text-indigo-600 hover:text-indigo-500 hover:underline">this server</a>
                    or your banner will not work
                </p>
                <?php if (!empty($msg3)) { ?>
                    <div class="border <?php echo $classes3; ?> px-4 py-3 rounded relative" role="alert">
                        <span class="block sm:inline"><?php echo $msg3; ?></span>
                    </div>
                <?php } ?>
                <form action="manage.php" method="POST">
                    <div class="relative flex mt-2">
                        <label for="discordid" class="sr-only">Discord ID</label>
                        <input id="discordid" name="discordid" type="discordid" autocomplete="discordid" value="<?php echo $_SESSION["c99discordid"]; ?>" class="bg-gray-800 rounded relative block w-full appearance-none mb-2 border border-transparent px-3 py-2 text-white placeholder-gray-400 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" placeholder="Discord ID">
                    </div>
                    <button type="submit" name="updateC99DiscordID" class="group relative flex w-full justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                        Save
                    </button>
                </form>
            </div>
            <div class="bg-gray-900 p-3 shadow rounded-md">
                <h2 class="text-lg font-bold leading-7 text-white sm:truncate sm:text-lg sm:tracking-tight">Spotify track</h2>
                <?php if (!empty($msg2)) { ?>
                    <div class="border <?php echo $classes2; ?> px-4 py-3 rounded relative" role="alert">
                        <span class="block sm:inline"><?php echo $msg2; ?></span>
                    </div>
                <?php } ?>
                <form action="manage.php" method="POST">
                    <div class="relative flex mt-2">
                        <label for="spotifytrackid" class="sr-only">Spotify Track ID</label>
                        <input id="spotifytrackid" name="spotifytrackid" type="spotifytrackid" autocomplete="spotifytrackid" value="<?php echo $_SESSION["spotifytrackid"]; ?>" class="bg-gray-800 rounded relative block w-full appearance-none mb-2 border border-transparent px-3 py-2 text-white placeholder-gray-400 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" placeholder="Spotify Track ID">
                    </div>
                    <button type="submit" name="updateSpotifyTrackID" class="group relative flex w-full justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                        Save
                    </button>
                </form>
            </div>
            <div class="bg-gray-900 p-3 shadow rounded-md">
                <h2 class="text-lg font-bold leading-7 text-white sm:truncate sm:text-lg sm:tracking-tight">Socials</h2>
                <?php if (!empty($msg)) { ?>
                    <div class="border <?php echo $classes; ?> px-4 py-3 rounded relative" role="alert">
                        <span class="block sm:inline"><?php echo $msg; ?></span>
                    </div>
                <?php } ?>
                <form action="manage.php" method="POST">
                    <div class="relative flex mt-2">
                        <label for="twitter" class="sr-only">Twitter</label>
                        <div class="bg-gray-800 rounded relative block appearance-none mb-2 rounded border border-transparent px-3 py-2 text-white placeholder-gray-400 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm">
                            <svg class="h-6 transition-all text-blue-400 fill-current" role="img" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <title>Twitter</title>
                                <path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"></path>
                            </svg>
                        </div>
                        <input id="twitter" name="twitter" type="twitter" autocomplete="twitter" value="<?php echo $_SESSION["twitter"]; ?>" class="bg-gray-800 rounded relative block w-full appearance-none mb-2 border border-transparent px-3 py-2 text-white placeholder-gray-400 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" placeholder="Twitter">
                    </div>
                    <div class="relative flex ">
                        <label for="youtube" class="sr-only">YouTube</label>
                        <div class="bg-gray-800 rounded relative block appearance-none mb-2 rounded border border-transparent px-3 py-2 text-white placeholder-gray-400 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm">
                            <svg class="h-6 fill-current text-red-500" role="img" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <title>YouTube</title>
                                <path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"></path>
                            </svg>
                        </div>
                        <input id="youtube" name="youtube" type="youtube" autocomplete="youtube" value="<?php echo $_SESSION["youtube"]; ?>" class="bg-gray-800 rounded relative block w-full appearance-none mb-2 border border-transparent px-3 py-2 text-white placeholder-gray-400 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" placeholder="YouTube">
                    </div>
                    <div class="relative flex">
                        <label for="steam" class="sr-only">Steam</label>
                        <div class="bg-gray-800 rounded relative block appearance-none mb-2 rounded border border-transparent px-3 py-2 text-white placeholder-gray-400 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm">
                            <svg class="h-6 text-black dark:text-gray-200 transition-all fill-current" role="img" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <title>Steam</title>
                                <path d="M11.979 0C5.678 0 .511 4.86.022 11.037l6.432 2.658c.545-.371 1.203-.59 1.912-.59.063 0 .125.004.188.006l2.861-4.142V8.91c0-2.495 2.028-4.524 4.524-4.524 2.494 0 4.524 2.031 4.524 4.527s-2.03 4.525-4.524 4.525h-.105l-4.076 2.911c0 .052.004.105.004.159 0 1.875-1.515 3.396-3.39 3.396-1.635 0-3.016-1.173-3.331-2.727L.436 15.27C1.862 20.307 6.486 24 11.979 24c6.627 0 11.999-5.373 11.999-12S18.605 0 11.979 0zM7.54 18.21l-1.473-.61c.262.543.714.999 1.314 1.25 1.297.539 2.793-.076 3.332-1.375.263-.63.264-1.319.005-1.949s-.75-1.121-1.377-1.383c-.624-.26-1.29-.249-1.878-.03l1.523.63c.956.4 1.409 1.5 1.009 2.455-.397.957-1.497 1.41-2.454 1.012H7.54zm11.415-9.303c0-1.662-1.353-3.015-3.015-3.015-1.665 0-3.015 1.353-3.015 3.015 0 1.665 1.35 3.015 3.015 3.015 1.663 0 3.015-1.35 3.015-3.015zm-5.273-.005c0-1.252 1.013-2.266 2.265-2.266 1.249 0 2.266 1.014 2.266 2.266 0 1.251-1.017 2.265-2.266 2.265-1.253 0-2.265-1.014-2.265-2.265z"></path>
                            </svg>
                        </div>
                        <input id="steam" name="steam" type="steam" autocomplete="steam" value="<?php echo $_SESSION["steam"]; ?>" class="bg-gray-800 rounded relative block w-full appearance-none mb-2 border border-transparent px-3 py-2 text-white placeholder-gray-400 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" placeholder="Steam">
                    </div>
                    <div class="relative flex">
                        <label for="discord" class="sr-only">Discord</label>
                        <div class="bg-gray-800 rounded relative block appearance-none mb-2 rounded border border-transparent px-3 py-2 text-white placeholder-gray-400 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm">
                            <svg class="fill-current text-indigo-500 h-6" role="img" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <title>Discord</title>
                                <path d="M20.317 4.3698a19.7913 19.7913 0 00-4.8851-1.5152.0741.0741 0 00-.0785.0371c-.211.3753-.4447.8648-.6083 1.2495-1.8447-.2762-3.68-.2762-5.4868 0-.1636-.3933-.4058-.8742-.6177-1.2495a.077.077 0 00-.0785-.037 19.7363 19.7363 0 00-4.8852 1.515.0699.0699 0 00-.0321.0277C.5334 9.0458-.319 13.5799.0992 18.0578a.0824.0824 0 00.0312.0561c2.0528 1.5076 4.0413 2.4228 5.9929 3.0294a.0777.0777 0 00.0842-.0276c.4616-.6304.8731-1.2952 1.226-1.9942a.076.076 0 00-.0416-.1057c-.6528-.2476-1.2743-.5495-1.8722-.8923a.077.077 0 01-.0076-.1277c.1258-.0943.2517-.1923.3718-.2914a.0743.0743 0 01.0776-.0105c3.9278 1.7933 8.18 1.7933 12.0614 0a.0739.0739 0 01.0785.0095c.1202.099.246.1981.3728.2924a.077.077 0 01-.0066.1276 12.2986 12.2986 0 01-1.873.8914.0766.0766 0 00-.0407.1067c.3604.698.7719 1.3628 1.225 1.9932a.076.076 0 00.0842.0286c1.961-.6067 3.9495-1.5219 6.0023-3.0294a.077.077 0 00.0313-.0552c.5004-5.177-.8382-9.6739-3.5485-13.6604a.061.061 0 00-.0312-.0286zM8.02 15.3312c-1.1825 0-2.1569-1.0857-2.1569-2.419 0-1.3332.9555-2.4189 2.157-2.4189 1.2108 0 2.1757 1.0952 2.1568 2.419 0 1.3332-.9555 2.4189-2.1569 2.4189zm7.9748 0c-1.1825 0-2.1569-1.0857-2.1569-2.419 0-1.3332.9554-2.4189 2.1569-2.4189 1.2108 0 2.1757 1.0952 2.1568 2.419 0 1.3332-.946 2.4189-2.1568 2.4189Z"></path>
                            </svg>
                        </div>
                        <input id="discord" name="discord" type="discord" autocomplete="discord" value="<?php echo $_SESSION["discord"]; ?>" class="bg-gray-800 rounded relative block w-full appearance-none mb-2 rounded border border-transparent px-3 py-2 text-white placeholder-gray-400 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" placeholder="Discord invite">
                    </div>
                    <div class="relative flex">
                        <label for="github" class="sr-only">Github</label>
                        <div class="bg-gray-800 rounded relative block appearance-none mb-2 rounded border border-transparent px-3 py-2 text-white placeholder-gray-400 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm">
                            <svg class="h-6 transition-all text-black dark:text-gray-200 fill-current" role="img" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <title>GitHub</title>
                                <path d="M12 .297c-6.63 0-12 5.373-12 12 0 5.303 3.438 9.8 8.205 11.385.6.113.82-.258.82-.577 0-.285-.01-1.04-.015-2.04-3.338.724-4.042-1.61-4.042-1.61C4.422 18.07 3.633 17.7 3.633 17.7c-1.087-.744.084-.729.084-.729 1.205.084 1.838 1.236 1.838 1.236 1.07 1.835 2.809 1.305 3.495.998.108-.776.417-1.305.76-1.605-2.665-.3-5.466-1.332-5.466-5.93 0-1.31.465-2.38 1.235-3.22-.135-.303-.54-1.523.105-3.176 0 0 1.005-.322 3.3 1.23.96-.267 1.98-.399 3-.405 1.02.006 2.04.138 3 .405 2.28-1.552 3.285-1.23 3.285-1.23.645 1.653.24 2.873.12 3.176.765.84 1.23 1.91 1.23 3.22 0 4.61-2.805 5.625-5.475 5.92.42.36.81 1.096.81 2.22 0 1.606-.015 2.896-.015 3.286 0 .315.21.69.825.57C20.565 22.092 24 17.592 24 12.297c0-6.627-5.373-12-12-12"></path>
                            </svg>
                        </div>
                        <input id="github" name="github" type="github" autocomplete="github" value="<?php echo $_SESSION["github"]; ?>" class="bg-gray-800 rounded relative block w-full appearance-none mb-2 rounded border border-transparent px-3 py-2 text-white placeholder-gray-400 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" placeholder="Github">
                    </div>
                    <div class="relative flex">
                        <label for="telegram" class="sr-only">Telegram</label>
                        <div class="bg-gray-800 rounded relative block appearance-none mb-2 rounded border border-transparent px-3 py-2 text-white placeholder-gray-400 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm">
                            <svg class="h-6 w-6" width="65" height="60" viewBox="0 0 240.1 240.1" enable-background="new 0 0 240.1 240.1">
                                <title>Telegram</title>
                                <g id="Artboard">
                                    <linearGradient id="Oval_1_" gradientUnits="userSpaceOnUse" x1="0" y1="0" x2="50" y2="50" gradientTransform="rotate(90) translate(-0.15, -0.5)">
                                        <stop offset="0" style="stop-color: rgb(42, 171, 238);"></stop>
                                        <stop offset="1" style="stop-color: rgb(34, 158, 217);"></stop>
                                    </linearGradient>
                                    <circle id="Oval" fill-rule="evenodd" clip-rule="evenodd" fill="url(#Oval_1_)" cx="120.1" cy="120.1" r="120.1"></circle>
                                    <path id="Path-3" fill-rule="evenodd" clip-rule="evenodd" fill="#FFFFFF" d="M54.3,118.8c35-15.2,58.3-25.3,70-30.2 c33.3-13.9,40.3-16.3,44.8-16.4c1,0,3.2,0.2,4.7,1.4c1.2,1,1.5,2.3,1.7,3.3s0.4,3.1,0.2,4.7c-1.8,19-9.6,65.1-13.6,86.3 c-1.7,9-5,12-8.2,12.3c-7,0.6-12.3-4.6-19-9c-10.6-6.9-16.5-11.2-26.8-18c-11.9-7.8-4.2-12.1,2.6-19.1c1.8-1.8,32.5-29.8,33.1-32.3 c0.1-0.3,0.1-1.5-0.6-2.1c-0.7-0.6-1.7-0.4-2.5-0.2c-1.1,0.2-17.9,11.4-50.6,33.5c-4.8,3.3-9.1,4.9-13,4.8 c-4.3-0.1-12.5-2.4-18.7-4.4c-7.5-2.4-13.5-3.7-13-7.9C45.7,123.3,48.7,121.1,54.3,118.8z"></path>
                                </g>
                            </svg>
                        </div>
                        <input id="telegram" name="telegram" type="telegram" autocomplete="telegram" value="<?php echo $_SESSION["telegram"]; ?>" class="bg-gray-800 rounded relative block w-full appearance-none mb-2 rounded border border-transparent px-3 py-2 text-white placeholder-gray-400 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" placeholder="Telegram">
                    </div>
                    <div class="relative flex">
                    <label for="breachedforums" class="sr-only">BreachedForums</label>
                        <div class="bg-gray-800 rounded relative block appearance-none mb-2 rounded border border-transparent px-3 py-2 text-white placeholder-gray-400 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm">
                            <img src="https://cdn.breached.vc/logo.png" class="h-6 w-6 select-none" title="BreachedForums">
                        </div>
                        <input id="breachedforums" name="breachedforums" type="breachedforums" autocomplete="breachedforums" value="<?php echo $_SESSION["breachedforums"]; ?>" class="bg-gray-800 rounded relative block w-full appearance-none mb-2 rounded border border-transparent px-3 py-2 text-white placeholder-gray-400 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" placeholder="BreachedForums">
                    </div>
                    <div class="relative flex"></div>
                    <div class="relative flex"></div>
                    <div class="relative flex"></div>
                    <button type="submit" name="updateSocials" class="group relative flex w-full justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                        Save
                    </button>
                </form>
            </div>