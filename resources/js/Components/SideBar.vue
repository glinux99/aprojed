<script setup>
import {
  Dialog,
  DialogPanel,
  TransitionChild,
  TransitionRoot,
} from '@headlessui/vue'
import {
  FolderIcon,
  HomeIcon,
  UsersIcon,
  XMarkIcon,
  TagIcon,
  Cog6ToothIcon,
  ShieldCheckIcon,
  KeyIcon,
  AdjustmentsHorizontalIcon,
} from '@heroicons/vue/24/outline'
import { Link } from '@inertiajs/vue3';

defineProps({
  sidebarOpen: {
    type: Boolean,
    required: true,
  },
});

const emit = defineEmits(['close']);

const navigation = [
  { name: 'Dashboard', href: route('dashboard'), icon: HomeIcon, current: route().current('dashboard') },
  { name: 'Articles', href: route('articles.index'), icon: FolderIcon, current: route().current('articles.index') || route().current('articles.create') || route().current('articles.edit') },
  { name: 'Catégories', href: route('categories.index'), icon: TagIcon, current: route().current('categories.index') || route().current('categories.create') || route().current('categories.edit') },
];

const adminNavigation = [
  { name: 'Utilisateurs', href: route('users.index'), icon: UsersIcon, current: route().current('users.index') },
  { name: 'Documents', href: route('documents.index'), icon: FolderIcon, current: route().current('documents.index') },
//   { name: 'Rôles', href: route('roles.index'), icon: KeyIcon, current: route().current('roles.index') },
//   { name: 'Permissions', href: route('permissions.index'), icon: ShieldCheckIcon, current: route().current('permissions.index') },
  { name: 'Configuration Site', href: route('settings.index'), icon: AdjustmentsHorizontalIcon, current: route().current('settings.edit') },
];
</script>

<template>
  <div>
    <TransitionRoot as="template" :show="sidebarOpen">
      <Dialog as="div" class="relative z-50 lg:hidden" @close="$emit('close')">
        <TransitionChild as="template" enter="transition-opacity ease-linear duration-300" enter-from="opacity-0" enter-to="opacity-100" leave="transition-opacity ease-linear duration-300" leave-from="opacity-100" leave-to="opacity-0">
          <div class="fixed inset-0 bg-gray-900/80" />
        </TransitionChild>

        <div class="fixed inset-0 flex">
          <TransitionChild as="template" enter="transition ease-in-out duration-300 transform" enter-from="-translate-x-full" enter-to="translate-x-0" leave="transition ease-in-out duration-300 transform" leave-from="translate-x-0" leave-to="-translate-x-full">
            <DialogPanel class="relative mr-16 flex w-full max-w-xs flex-1">
              <TransitionChild as="template" enter="ease-in-out duration-300" enter-from="opacity-0" enter-to="opacity-100" leave="ease-in-out duration-300" leave-from="opacity-100" leave-to="opacity-0">
                <div class="absolute left-full top-0 flex w-16 justify-center pt-5">
                  <button type="button" class="-m-2.5 p-2.5" @click="$emit('close')">
                    <span class="sr-only">Close sidebar</span>
                    <XMarkIcon class="h-6 w-6 text-white" aria-hidden="true" />
                  </button>
                </div>
              </TransitionChild>
              <!-- Sidebar component, swap this element with another sidebar if you like -->
              <div class="flex grow flex-col gap-y-5 overflow-y-auto bg-gray-900 px-6 pb-2 ring-1 ring-white/10">
                <div class="flex h-16 shrink-0 items-center">
                  <Link href="/">
                      <img src="/assets/img/logo sur fond BLANC.jpg" alt="logo" class="h-8 w-auto">
                  </Link>
                </div>
                <nav class="flex flex-1 flex-col">
                  <ul role="list" class="flex flex-1 flex-col gap-y-7">
                    <li>
                      <ul role="list" class="-mx-2 space-y-1">
                        <li v-for="item in navigation" :key="item.name">
                          <Link :href="item.href" :class="[item.current ? 'bg-gray-800 text-white' : 'text-gray-400 hover:bg-gray-800 hover:text-white', 'group flex gap-x-3 rounded-md p-2 text-sm font-semibold leading-6']">
                            <component :is="item.icon" class="h-6 w-6 shrink-0" aria-hidden="true" />
                            {{ item.name }}
                          </Link>
                        </li>
                      </ul>
                    </li>
                    <li>
                      <div class="text-xs font-semibold leading-6 text-gray-400">Administration</div>
                      <ul role="list" class="-mx-2 mt-2 space-y-1">
                        <li v-for="item in adminNavigation" :key="item.name">
                          <Link :href="item.href" :class="[item.current ? 'bg-gray-800 text-white' : 'text-gray-400 hover:bg-gray-800 hover:text-white', 'group flex gap-x-3 rounded-md p-2 text-sm font-semibold leading-6']">
                            <component :is="item.icon" class="h-6 w-6 shrink-0" aria-hidden="true" />
                            {{ item.name }}
                          </Link>
                        </li>
                      </ul>
                    </li>
                    <li class="mt-auto">
                      <Link href="#" class="group -mx-2 flex gap-x-3 rounded-md p-2 text-sm font-semibold leading-6 text-gray-400 hover:bg-gray-800 hover:text-white">
                        <Cog6ToothIcon class="h-6 w-6 shrink-0" aria-hidden="true" />
                        Settings
                      </Link>
                    </li>
                  </ul>
                </nav>
              </div>
            </DialogPanel>
          </TransitionChild>
        </div>
      </Dialog>
    </TransitionRoot>

    <!-- Static sidebar for desktop -->
    <div class="hidden lg:fixed lg:inset-y-0 lg:z-50 lg:flex lg:w-72 lg:flex-col">
      <!-- Sidebar component, swap this element with another sidebar if you like -->
      <div class="flex grow flex-col gap-y-5 overflow-y-auto bg-gray-900 px-6 pb-4">
        <div class="flex h-16 shrink-0 items-center">
          <Link href="/">
              <img src="/assets/img/aprojedwhitelg.png" alt="logo" class="h-12 w-auto">
          </Link>
        </div>
        <nav class="flex flex-1 flex-col">
          <ul role="list" class="flex flex-1 flex-col gap-y-7">
            <li>
              <ul role="list" class="-mx-2 space-y-1">
                <li v-for="item in navigation" :key="item.name">
                  <Link :href="item.href" :class="[item.current ? 'bg-gray-800 text-white' : 'text-gray-400 hover:bg-gray-800 hover:text-white', 'group flex gap-x-3 rounded-md p-2 text-sm font-semibold leading-6']">
                    <component :is="item.icon" class="h-6 w-6 shrink-0" aria-hidden="true" />
                    {{ item.name }}
                  </Link>
                </li>
              </ul>
            </li>
            <li>
              <div class="text-xs font-semibold leading-6 text-gray-400">Administration</div>
              <ul role="list" class="-mx-2 mt-2 space-y-1">
                <li v-for="item in adminNavigation" :key="item.name">
                  <Link :href="item.href" :class="[item.current ? 'bg-gray-800 text-white' : 'text-gray-400 hover:bg-gray-800 hover:text-white', 'group flex gap-x-3 rounded-md p-2 text-sm font-semibold leading-6']">
                    <component :is="item.icon" class="h-6 w-6 shrink-0" aria-hidden="true" />
                    {{ item.name }}
                  </Link>
                </li>
              </ul>
            </li>
            <li class="mt-auto">
              <Link href="#" class="group -mx-2 flex gap-x-3 rounded-md p-2 text-sm font-semibold leading-6 text-gray-400 hover:bg-gray-800 hover:text-white">
                <Cog6ToothIcon class="h-6 w-6 shrink-0" aria-hidden="true" />
                Settings
              </Link>
            </li>
          </ul>
        </nav>
      </div>
    </div>
  </div>
</template>
