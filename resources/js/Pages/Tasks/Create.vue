<template>
    <app-layout title="Create">
        <template #navlink>
            <inertia-link :href="route('contracts.index')">Contract</inertia-link> / Create
        </template>
        <template #content>
            <form enctype="multipart/form-data" class="bg-white shadow-2xl rounded mt-16 px-8 pt-6 pb-8 mb-4" @submit.prevent="submit">

                <div class="mb-5">
                    <label for="name" class="block text-sm text-gray-700 font-bold mb-2">Entrez le mom de la Tache</label>
                    <input
                        id="name"
                        type="text"
                        placeholder="Nom de la tache"
                        class="border rounded shadow appearance-none w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        v-model="form.name"
                    />
                    <div v-if="$page.props.errors.name" class="text-red-500">{{ $page.props.errors.name }}</div>
                </div>

                <div class="mb-5">
                    <label for="description" class="block text-sm text-gray-700 font-bold mb-2">Description de la Tache</label>
                    <input
                        id="decription"
                        type="text"
                        placeholder="description de la tache"
                        class="border rounded shadow appearance-none w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        v-model="form.description"
                    />
                    <div v-if="$page.props.errors.name" class="text-red-500">{{ $page.props.errors.name }}</div>
                </div> 

                <div class="mb-5">
                    <label for="methode" class="block text-sm text-gray-700 font-bold mb-2">Status De la Tache</label>
                    <select class="w-full rounded-lg" id="methode" v-model="form.status">
                        <option value="en cours" default selected>EN COURS</option>
                        <option value="achevées">ACHEVEES</option>
                        <option value="OK">OK</option>
                    </select>
                    <div v-if="$page.props.errors.method" class="text-red-500">{{ $page.props.errors.method }}</div>
                </div>            

                <div class="mb-5">
                    <label for="endDate" class="block text-sm text-gray-700 font-bold mb-2">Date De fin de la Tache</label>
                    <input
                        id="endDate"
                        type="Date"
                        placeholder="Entrez la date et l'heure de fin de la tache"
                        class="border rounded shadow appearance-none w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        v-model="form.endDate"
                    />
                    <div v-if="$page.props.errors.startDate" class="text-red-500">{{ $page.props.errors.startDate }}</div>
                </div>
                <button type="submit" class="block rounded bg-green-500 py-2 px-3 text-white">Enregistrer</button>
            </form>
        </template>
    </app-layout>
</template>

<script>
    import AppLayout from "../../Layouts/AppLayout";
    export default {

        components: {
            AppLayout,
        },

        props: [],


        data() {
            return {
                form: {
                    name: '',
                    description: '',
                    endDate: null,
                    status: '',
                }
            }
        },

        methods: {
            submit(){
                this.$inertia.post('/task/store',this.form)
            },
        },
    }
</script>
