<template>
    <app-layout>
        <template #content>
            <div class="bg-green-100 grid grid-cols-1 gap-5 p-4 mt-16 lg:grid-cols-2 xl:grid-cols-4">
                <div class="rounded overflow-hidden border bg-white mx-3 md:mx-0 lg:mx-0" v-for="task in this.tasksList.data" v-bind:key="task.id">
                    <Link :href="'task/edit/'+ task.id">
                        <img class="w-full bg-cover" title="Voir Les Details" src="https://3.bp.blogspot.com/-Chu20FDi9Ek/WoOD-ehQ29I/AAAAAAAAK7U/mc4CAiTYOY8VzOFzBKdR52aLRiyjqu0MwCLcBGAs/s1600/DSC04596%2B%25282%2529.JPG">
                    </LinK>
                    <div class="px-3 pb-2">
                        <div class="pt-1">
                            <div class="mb-2 text-sm">
                                <span class="capitalize font-bold mr-2">{{ task.name }}</span>
                            </div>
                            <div class="mb-2 text-sm flex">
                                <h3>Status: </h3><span class="capitalize font-bold mr-2"> {{ task.status }}</span>
                            </div>
                            <div class="mb-2 text-sm flex">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-3 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <span class="capitalize text-red-800 font-bold mr-2">{{ task.endDate }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <my-pagination :links="tasks.links"/>
        </template>
    </app-layout>
</template>

<script>

    import AppLayout from "../../Layouts/AppLayout";
    import JetResponsiveNavLink from '@/Jetstream/ResponsiveNavLink'
    import myPagination from '@/Components/myPagination.vue'
    import { Head, Link } from '@inertiajs/inertia-vue3';


    export default {

        components:{
            AppLayout,
            JetResponsiveNavLink,
            myPagination,
            Link,
        },

        props: ['tasks'],
        data() {
            return {
                tasksList: this.tasks,
            }
        },

    }
</script>
