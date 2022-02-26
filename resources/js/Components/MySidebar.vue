<template>
    <div class="lg:w-2/12 lg:max-h-full border-r-2 flex min-h-screen bg-white p-0">
        <div class="w-full">
            <div class="bg-blue-500 py-5 text-center text-white">
              <h1 class="text-bold">{{ $page.props.user.name }}</h1>
              <h1>Compte personnel</h1>
              <div class="bg-yellow-600 rounded-full h-24 w-24 justify-center my-5 mx-16">
              </div>
              <div class="">
                <p>Celui qui fait un atome de bien le verra....</p><br>Coran 99:7
              </div>
            </div>
            <ul>
              <li class="flex">
                    <jet-responsive-nav-link :href="route('dashboard')" :active="route().current('dashboard')" class="w-full">
                        <div class="text-center flex">
                          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                        </svg>
                            Accueil
                        </div>
                    </jet-responsive-nav-link>
                </li>
                  <li class="flex">
                    <jet-responsive-nav-link :href="route('task.create')" :active="route().current('task.create')" class="w-full">
                        <div class="text-center flex">
                          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                          </svg>
                            Nouvelle Taches
                        </div>
                    </jet-responsive-nav-link>
                </li>
                <li class="flex">
                    <jet-responsive-nav-link :href="route('historical')" :active="route().current('historical')" class="w-full">
                        <div class="text-center flex">
                          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 15v-1a4 4 0 00-4-4H8m0 0l3 3m-3-3l3-3m9 14V5a2 2 0 00-2-2H6a2 2 0 00-2 2v16l4-2 4 2 4-2 4 2z" />
                          </svg>
                            Historiques
                        </div>
                    </jet-responsive-nav-link>
                </li>
            </ul>
        </div>
    </div>
</template>

<script>
  import JetResponsiveNavLink from '@/Jetstream/ResponsiveNavLink'

  export default {
      components:{
          JetResponsiveNavLink,
      }
  }
</script>
