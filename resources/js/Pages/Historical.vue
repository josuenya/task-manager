<template>
    <app-layout title="Historical">
        <template #content>
            <div>
                
            </div>
            <div class="bg-white rounded-md shadow-lg overflow-x-auto p-4 mt-16">
                <h2 class="text-center font-bold text-xl uppercase underline">Afficher par Période</h2>
                <div class="py-5 flex">
                    <form enctype="multipart/form-data" class="bg-white rounded w-full flex" @submit.prevent="submit">
                        <label for="date" class="block text-sm text-gray-700 font-bold mb-2 mr-3">Selectioner la date</label>
                        <input
                            id="date"
                            type="Date"
                            v-model="form.current_date"
                            class="border mr-3 rounded shadow appearance-none w-1/4 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        />
                        <button v-on:click="submit" type="submit" class="block rounded bg-green-500 py-2 px-3 text-white"> Valider </button>
                    </form>
                </div>
                
                <table class="w-full whitespace-nowrap">
                    <thead>
                        <tr class="bg-blue-500 text-white uppercase text-sm leading-normal">
                            <th class="py-3 px-6 text-left">Nom De la tache</th>
                            <th class="py-3 px-6 text-left">Etat de la tache </th>
                            <th class="py-3 px-6 text-left">Date de création</th>
                            <th class="py-3 px-6 text-left">Date de Date de Modification</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-600 text-sm font-light">
                        <tr class="uppercase font-bold border-b border-gray-200 hover:bg-gray-100" v-for="task in this.tasksList.data" v-bind:key="task.id">
                            <td class="py-3 px-6 text-left whitespace-nowrap">{{ task.name }}</td>
                            <td class="py-3 px-6 text-left whitespace-nowrap">{{ task.status }}</td>
                            <td class="py-3 px-6 text-left whitespace-nowrap">{{ task.created_at }}</td>
                            <td class="py-3 px-6 text-left whitespace-nowrap">{{ task.updated_at }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <!-- <my-pagination :links="tasks.links"/> -->
        </template>
    </app-layout>
</template>

<script>

    import AppLayout from '@/Layouts/AppLayout.vue'
    import JetResponsiveNavLink from '@/Jetstream/ResponsiveNavLink'
    import myPagination from '@/Components/myPagination.vue'

    export default {

        components:{
            AppLayout,
            JetResponsiveNavLink,
            myPagination,
        },

        props: ['tasksHistorical'],
        data() {
            return {
                tasksList: this.tasksHistorical,
                form: {
                    current_date: '',
                }
            }
        },

          methods: {
            submit(){
                axios.get(route('historical.getData'),{ params: { current_date: this.form.current_date } })
                .then(response => this.tasksList = response.data)
                .catch(error => {}); 
            },
        },
    }
</script>
