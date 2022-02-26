<template>
    <app-layout title="Edit">
        <template #content>

            <form enctype="multipart/form-data" class="bg-white shadow-2xl rounded mt-16 px-8 pt-6 pb-8 mb-4" @submit.prevent="submit">
                <div class="mb-5">
                    <label for="name" class="block text-sm text-gray-700 font-bold mb-2">Nom De la tache</label>
                    <input
                        id="name"
                        type="text"
                        class="bg-gray-200 focus:bg-white font-bold border rounded shadow appearance-none w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        v-model="taskData.name"
                    />
                    <div v-if="$page.props.errors.name" class="text-red-500">{{ $page.props.errors.name }}</div>
                </div>

                <div class="mb-5">
                    <label for="description" class="block text-sm text-gray-700 font-bold mb-2">Description Du Contrat</label>
                    <input
                        id="description"
                        type="text"
                        class="bg-gray-200 focus:bg-white font-bold border rounded shadow appearance-none w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        v-model="taskData.description"
                    />
                    <div v-if="$page.props.errors.name" class="text-red-500">{{ $page.props.errors.description }}</div>
                </div>

                <div class="mb-5">
                    <label for="user_id" class="font-bold block text-sm text-gray-700 mb-2">Status de la Tache</label>
                    <select class="w-full rounded-lg bg-gray-200 focus:bg-white font-bold" id="status" v-model="taskData.status">
                        <option value="" selected disabled >Status de la Tache</option>
                        <option value="en cours" selected>EN COURS</option>
                        <option value="achevées">ACHEVEES</option>
                        <option value="OK">OK</option>
                    </select>
                    <div v-if="$page.props.errors.user_id" class="text-red-500">{{ $page.props.errors.status }}</div>
                </div>           

                <button type="submit" class="block rounded bg-green-500 py-2 px-3 text-white"> Cloturer </button>
            
            </form>
        </template>
    </app-layout>
</template>

<script>
    import AppLayout from "../../Layouts/AppLayout";
    import {Inertia} from "@inertiajs/inertia";
    export default {
        components: {
            AppLayout
        },

        props: ['task'],

        data() {
            return {
                taskData: this.task,
            }
        },

        methods: {
            submit() {
                Inertia.patch('/task/update/' + this.task.id,this.taskData)
            },
        },
    }

</script>
