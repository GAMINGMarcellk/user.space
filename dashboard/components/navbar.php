<div class="min-h-full">
  <nav class="bg-gray-800">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
      <div class="flex h-16 items-center justify-between">
        <div class="flex items-center">
            <div class="ml-10 flex items-baseline space-x-4">
                <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                <a href="/dashboard/" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">user.space</a>
            </div>
        </div>
        <div class="relative ml-3" x-data="{ open: false }">
          <div>
            <button @click="open = !open" type="button" class="flex rounded-full bg-gray-800 text-sm focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800" id="user-menu-button" aria-expanded="false" aria-haspopup="true">
              <span class="sr-only">Open user menu</span>
              <div class="relative">
                <?php if ($_SESSION["avatar"] != "") { ?>
                  <img class="h-8 w-8 rounded-full" src="<?php echo $_SESSION['avatar']; ?>" alt="">
                <?php } else { ?>
                  <div class="relative inline-flex items-center justify-center w-8 h-8 overflow-hidden bg-gray-100 rounded-full dark:bg-gray-600">
                    <span class="font-medium text-gray-600 dark:text-gray-300"><?php echo initials(htmlspecialchars($_SESSION['username'])); ?></span>
                  </div>
                <?php } ?>
                <span class="bottom-0 left-6 absolute w-3.5 h-3.5 bg-green-400 border-2 border-white dark:border-gray-800 rounded-full"></span>
              </div>
            </button>
          </div>
          <div x-show="open" class="absolute left-0 z-10 mt-2 w-48 origin-top-left rounded-md bg-gray-900 py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
            <a href="/@<?php echo htmlspecialchars($_SESSION['pageurl']); ?>" class="block px-4 py-2 text-sm text-gray-500 hover:bg-gray-700 hover:text-white rounded" role="menuitem" tabindex="-1" id="user-menu-item-0">View profile</a>
            <a href="/dashboard/manage.php" class="block px-4 py-2 text-sm text-gray-500 hover:bg-gray-700 hover:text-white rounded" role="menuitem" tabindex="-1" id="user-menu-item-1">Manage</a>
            <?php if ($_SESSION["admin"] == 1) { ?>
              <a href="/dashboard/admin.php" class="block px-4 py-2 text-sm text-gray-500 hover:bg-gray-700 hover:text-white rounded" role="menuitem" tabindex="-1" id="user-menu-item-1">Admin panel</a>
            <?php } ?>
            <a href="/dashboard/logout.php" class="block px-4 py-2 text-sm text-red-500 hover:bg-gray-700 hover:text-red-500 rounded" role="menuitem" tabindex="-1" id="user-menu-item-2">Log out</a>
          </div>
        </div>
    </div>
  </nav>
</div>