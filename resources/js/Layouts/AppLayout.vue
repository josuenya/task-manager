<template>
    <div>
        <Head :title="title" />

        <jet-banner /> 

        <div class="min-h-screen bg-gray-100">
            <nav class="bg-gray-800 sticky top-0">
                <!-- Primary Navigation Menu -->
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="flex justify-between h-16">
                        <div class="flex">
                            <!-- Logo -->
                            <div class="flex-shrink-0 flex items-center">
                                <Link :href="route('dashboard')">
                                    <jet-application-mark class="block h-9 w-auto" />
                                </Link>
                            </div>
                        </div>
                        
                        <!-- SearchBar component--> 
                        <div class="hidden justify-center p-4 space-x-8 sm:-my-px sm:ml-10 sm:flex">
                                <search-bar />
                        </div>

                        <div class="hidden sm:flex sm:items-center sm:ml-6">
                            <!-- Authentication -->
                            <form @submit.prevent="logout">
                                <jet-dropdown-link as="button">
                                    Se Deconnecter
                                </jet-dropdown-link>
                            </form>
                            <img class="h-8 w-8 rounded-full object-cover" :src="$page.props.user.profile_photo_url" :alt="$page.props.user.name" />
                            <span class="text-white p-2">{{ $page.props.user.name }} </span>
                            
                            <div class="align-right"> 
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z" />
                                </svg>
                            </div>
                        </div>

                        <!-- Hamburger -->
                        <div class="-mr-2 flex items-center sm:hidden">
                            <button @click="showingNavigationDropdown = ! showingNavigationDropdown" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition">
                                <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                    <path :class="{'hidden': showingNavigationDropdown, 'inline-flex': ! showingNavigationDropdown }" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                                    <path :class="{'hidden': ! showingNavigationDropdown, 'inline-flex': showingNavigationDropdown }" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Responsive Navigation Menu -->
                <div :class="{'block': showingNavigationDropdown, 'hidden': ! showingNavigationDropdown}" class="sm:hidden">
                    <div class="pt-2 pb-3 space-y-1">
                        <jet-responsive-nav-link :href="route('dashboard')" :active="route().current('dashboard')">
                            Tableau De Board
                        </jet-responsive-nav-link>
                    </div>

                    <!-- Responsive Settings Options -->
                    <div class="pt-4 pb-1 border-t border-gray-200"> 
                        <div class="flex items-center px-4">
                            <div v-if="$page.props.jetstream.managesProfilePhotos" class="flex-shrink-0 mr-3" >
                                <img class="h-10 w-10 rounded-full object-cover" :src="$page.props.user.profile_photo_url" :alt="$page.props.user.name" />
                            </div>

                            <div>
                                <div class="font-medium text-base text-gray-800">{{ $page.props.user.name }}</div>
                                <div class="font-medium text-sm text-gray-500">{{ $page.props.user.email }}</div>
                            </div>
                        </div>

                        <div class="mt-3 space-y-1">
                            <jet-responsive-nav-link :href="route('profile.show')" :active="route().current('profile.show')">
                                Profile
                            </jet-responsive-nav-link>

                            <!-- Authentication -->
                            <form method="POST" @submit.prevent="logout">
                                <jet-responsive-nav-link as="button">
                                    Se Deconnecter
                                </jet-responsive-nav-link>
                            </form>
                        </div>
                    </div>
                </div>
            </nav>

            <nav class="bg-gray-900 sticky top-16">
                <!-- Primary Navigation Menu -->
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="uppercase flex justify-between h-16">
                        <div class="p-4 flex text-white">
                            <h1>TodoList</h1>
                        </div>
                        
                        <!-- SearchBar component--> 
                        <div class="uppercase text-white hidden justify-center p-4 space-x-8 sm:-my-px sm:ml-10 sm:flex">
                                <h1>flow</h1>
                                <h1>sista's</h1>
                        </div>

                        <div class="hidden sm:flex sm:items-center sm:ml-6 space-x-8">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-100" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 15a4 4 0 004 4h9a5 5 0 10-.1-9.999 5.002 5.002 0 10-9.78 2.096A4.001 4.001 0 003 15z" />
                                </svg>

                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-100" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                                </svg>

                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-100" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                        </div>

                        <!-- Hamburger -->
                        <div class="-mr-2 flex items-center sm:hidden">
                            <button @click="showingNavigationDropdown = ! showingNavigationDropdown" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition">
                                <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                    <path :class="{'hidden': showingNavigationDropdown, 'inline-flex': ! showingNavigationDropdown }" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                                    <path :class="{'hidden': ! showingNavigationDropdown, 'inline-flex': showingNavigationDropdown }" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </nav>
            
            <!-- Page Heading -->
            <header class="bg-white shadow" v-if="$slots.header">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    <slot name="header"></slot>
                </div>
            </header>

            <!-- Page Content -->
            <main class="h-screen"> 
                <div class="mx-auto bg-white shadow-md">
                    <div class="md:flex mt-0">
                        <my-sidebar />

                        <!-- <div class="p-10 lg:w-10/12 shadow-lg"> -->
                        <div class="lg:w-full shadow-lg">

                            <nav class="bg-gray-100 sticky shadow-lg top-32 pb-2">
                                <!-- Primary Navigation Menu -->
                                <div class="max-w-7xl mx-auto sm:px-6">
                                    <div class="flex justify-between h-16">
                                        <div class="flex p-4">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 mr-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z" />
                                            </svg>
                                            <h1 class="p-1 uppercase font-bold text-gray-500 text-xl">TodoList</h1>
                                        </div>

                                        <div class="bg-green-200 text-bold mb-4 p-1" v-if="$page.props.flash.success">
                                            {{ $page.props.flash.success }}
                                        </div>
                                        <div class="bg-green-200 text-red-600 text-bold mb-4 p-3" v-if="$page.props.flash.error">
                                            {{ $page.props.flash.error }}
                                        </div>
                                    </div>
                                    <div class="flex m-5">
                                        <Link :href="route('tasks.status') + '/' + 'all'" class="rounded-full bg-gray-300 px-5 mr-5">
                                            Toutes 
                                        </Link>

                                        <Link :href="route('tasks.status') + '/' + 'en cours'" class="rounded-full bg-gray-300 px-5 mr-5">
                                            En Cours
                                        </Link>
                                        <Link :href="route('tasks.status') + '/' + 'OK'" class="rounded-full bg-gray-300 px-5 mr-5">
                                            Terminer
                                        </Link>
                                        <Link :href="route('tasks.status') + '/' + 'achevées'" class="rounded-full bg-gray-300 px-5 mr-5">
                                            achevées
                                        </Link>                                        
                                    </div>
                                </div>
                            </nav>

                            <div class="bg-white rounded-lg">
                                <!-- <div class="bg-green-200 text-bold mb-4 p-3" v-if="$page.props.flash.success">
                                    {{ $page.props.flash.success }}
                                </div> -->
                                <!-- <div class="bg-green-200 text-red-600 text-bold mb-4 p-3" v-if="$page.props.flash.error">
                                    {{ $page.props.flash.error }}
                                </div> -->
                                <div>
                                    <slot name="content"></slot>
                                </div>
                            </div>
                            
                            <div class="text-center bottom-0 pt-4 font-bold">
                                <p class="text-black"> Copyright © TodoList 2021 By <a class="text-indigo-700 outline-none" target="_blank" href="https://www.linkedin.com/in/josue-nya-a055b316b/">Josue NYA</a></p>
                            </div>
                        </div> 
                    </div>
                </div>
            </main>
        </div>
    </div>
</template>

<script>
    import { defineComponent } from 'vue'
    import JetApplicationMark from '@/Jetstream/ApplicationMark.vue'
    import JetBanner from '@/Jetstream/Banner.vue'
    import JetDropdown from '@/Jetstream/Dropdown.vue'
    import JetDropdownLink from '@/Jetstream/DropdownLink.vue'
    import JetNavLink from '@/Jetstream/NavLink.vue'
    import JetResponsiveNavLink from '@/Jetstream/ResponsiveNavLink.vue'
    import SearchBar from '@/Components/SearchBar.vue'
    import MySidebar from '@/Components/MySidebar.vue'
    import { Head, Link } from '@inertiajs/inertia-vue3';

    export default defineComponent({
        props: {
            title: String,
        },

        components: {
            Head,
            JetApplicationMark,
            JetBanner,
            JetDropdown,
            JetDropdownLink,
            JetNavLink,
            JetResponsiveNavLink,
            Link,
            SearchBar,
            MySidebar,
        },

        data() {
            return {
                showingNavigationDropdown: false,
            }
        },

        methods: {
            switchToTeam(team) {
                this.$inertia.put(route('current-team.update'), {
                    'team_id': team.id
                }, {
                    preserveState: false
                }) 
            },

            logout() {
                this.$inertia.post(route('logout'));
            },

                // axios.get(route('historical.getData'),{ params: { term: this.form.current_date } })
                // .then(response => this.tasksList = response.data)
                // .catch(error => {});
        }
    })
</script>
