            <div class="bg-gray-900 p-3 shadow rounded-md">
                <h2 class="text-lg font-bold leading-7 text-white sm:truncate sm:text-lg sm:tracking-tight">Avatar URL</h2>
                <?php if (!empty($msg7)) { ?>
                    <div class="border <?php echo $classes7; ?> px-4 py-3 rounded relative" role="alert">
                        <span class="block sm:inline"><?php echo $msg7; ?></span>
                    </div>
                <?php } ?>
                <form action="manage.php" method="POST">
                    <div class="relative flex mt-2">
                        <label for="avatarurl" class="sr-only">Avatar URL</label>
                        <input id="avatarurl" name="avatarurl" type="avatarurl" autocomplete="avatarurl" value="<?php echo $_SESSION["avatar"]; ?>" class="bg-gray-800 rounded relative block w-full appearance-none mb-2 border border-transparent px-3 py-2 text-white placeholder-gray-400 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" placeholder="Avatar URL">
                    </div>
                    <button type="submit" name="updateAvatarURL" class="group relative flex w-full justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                        Save
                    </button>
                </form>
            </div>
            <div class="bg-gray-900 p-3 shadow rounded-md">
                <h2 class="text-lg font-bold leading-7 text-white sm:truncate sm:text-lg sm:tracking-tight">Banner URL</h2>
                <?php if (!empty($msg8)) { ?>
                    <div class="border <?php echo $classes8; ?> px-4 py-3 rounded relative" role="alert">
                        <span class="block sm:inline"><?php echo $msg8; ?></span>
                    </div>
                <?php } ?>
                <form action="manage.php" method="POST">
                    <div class="relative flex mt-2">
                        <label for="bannerurl" class="sr-only">Banner URL</label>
                        <input id="bannerurl" name="bannerurl" type="bannerurl" autocomplete="bannerurl" value="<?php echo $_SESSION["banner"]; ?>" class="bg-gray-800 rounded relative block w-full appearance-none mb-2 border border-transparent px-3 py-2 text-white placeholder-gray-400 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" placeholder="Banner URL">
                    </div>
                    <button type="submit" name="updateBannerURL" class="group relative flex w-full justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                        Save
                    </button>
                </form>
            </div>
            <div class="bg-gray-900 p-3 shadow rounded-md">
                <h2 class="text-lg font-bold leading-7 text-white sm:truncate sm:text-lg sm:tracking-tight">Username</h2>
                <?php if (!empty($msg6)) { ?>
                    <div class="border <?php echo $classes6; ?> px-4 py-3 rounded relative" role="alert">
                        <span class="block sm:inline"><?php echo $msg6; ?></span>
                    </div>
                <?php } ?>
                <form action="manage.php" method="POST">
                    <div class="relative flex mt-2">
                        <label for="username" class="sr-only">Username</label>
                        <input id="username" name="username" type="username" autocomplete="username" value="<?php echo $_SESSION["username"]; ?>" class="bg-gray-800 rounded relative block w-full appearance-none mb-2 border border-transparent px-3 py-2 text-white placeholder-gray-400 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" placeholder="Username">
                    </div>
                    <button type="submit" name="updateUsername" class="group relative flex w-full justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                        Save
                    </button>
                </form>
            </div>
            <div class="bg-gray-900 p-3 shadow rounded-md">
                <h2 class="text-lg font-bold leading-7 text-white sm:truncate sm:text-lg sm:tracking-tight">Page URL</h2>
                <?php if (!empty($msg5)) { ?>
                    <div class="border <?php echo $classes5; ?> px-4 py-3 rounded relative" role="alert">
                        <span class="block sm:inline"><?php echo $msg5; ?></span>
                    </div>
                <?php } ?>
                <form action="manage.php" method="POST">
                    <div class="relative flex mt-2">
                        <label for="pageurl" class="sr-only">Page URL</label>
                        <div class="bg-gray-800 rounded relative block appearance-none mb-2 rounded border border-transparent px-3 py-2 text-gray-400 placeholder-gray-400 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm">
                            <span>user.space/</span>
                        </div>
                        <input id="pageurl" name="pageurl" type="pageurl" autocomplete="pageurl" value="<?php echo $_SESSION["pageurl"]; ?>" class="bg-gray-800 rounded relative block w-full appearance-none mb-2 border border-transparent px-3 py-2 text-white placeholder-gray-400 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" placeholder="Page URL">
                    </div>
                    <button type="submit" name="updatePageURL" class="group relative flex w-full justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                        Save
                    </button>
                </form>
            </div>
            <div class="bg-gray-900 p-3 shadow rounded-md">
                <h2 class="text-lg font-bold leading-7 text-white sm:truncate sm:text-lg sm:tracking-tight">Bio</h2>
                <?php if (!empty($msg4)) { ?>
                    <div class="border <?php echo $classes4; ?> px-4 py-3 rounded relative" role="alert">
                        <span class="block sm:inline"><?php echo $msg4; ?></span>
                    </div>
                <?php } ?>
                <form action="manage.php" method="POST">
                    <div class="relative flex mt-2">
                        <label for="bio" class="sr-only">Bio</label>
                        <textarea rows="4" id="bio" name="bio" type="bio" autocomplete="bio" class="bg-gray-800 rounded block w-full appearance-none mb-2 border border-transparent px-3 py-2 text-white placeholder-gray-400 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" placeholder="Bio"><?php echo $_SESSION["bio"]; ?></textarea>
                    </div>
                    <button type="submit" name="updateBio" class="group relative flex w-full justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                        Save
                    </button>
                </form>
            </div>