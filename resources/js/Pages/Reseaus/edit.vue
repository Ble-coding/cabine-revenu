<template>
<app-layout>
    <template #header>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Modification des informations du {{reseau.libelle}}
        </h2>
    </template>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
             <div v-if="$page.props.flash.success" class="text-green-600 bg-green-200 p-4 alert">
                {{ $page.props.flash.success }}
            </div>
                <!-- <div v-if="$page.props.flash.danger" class="text-danger-600 bg-green-200 p-4 alert">
                {{ $page.props.flash.danger }}
            </div> -->
        <div class="w-full">
                <button class="ml-2 hover:bg-blue-700 text-white font-bold py-2 px-4 mb-1 rounded">
                    <inertia-link href="/reseaux/liste">🔙</inertia-link>
                </button>
                    <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" @submit.prevent="submit">
             <div class="flex justify-between items-center">
               <h1 class="font-bold text-green-700 mb-4">Formulaires de modification des réseaux</h1>
            </div>
            <hr />
            <div class="mt-4 mb-4">
              <label class="block text-gray-700 text-sm font-bold mb-2" for="libelle"> Libéllé du réseau </label>
              <input class="shadow appearance-none border rounded w-1/3 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="libelle" type="text" placeholder="Libellé" v-model="reseauData.libelle" />
              <!--<div class="bg-red-200 text-red-800 p-4 my-2" v-if="$page.errors.libelle">
                {{ $page.errors.libelle[0] }}
              </div> -->
            </div>
        <button
              class="block bg-indigo-800 hover:bg-indigo-600 text-white py-2 px-3 mt-3 rounded"
              type="submit"
            >
              Modifier
            </button>
               <button  @click.prevent="supprimer" class="block bg-red-100 hover:bg-red-300 text-white py-2 px-4 my-3 font-bold rounded">❌</button>
          </form>
            </div>
        </div>
    </div>
</app-layout>
</template>

<script>
import AppLayout from '@/Layouts/AppLayout'
// import Welcome from '@/Jetstream/Welcome'

export default {
    components: {
        AppLayout,
        // Welcome,
    },

     props: {
        reseau: {
            type: Object,
            required: true
        },
    },
    data() {
        return {
            reseauData: this.reseau,
        }
    },
     methods: {
        submit() {
            this.$inertia.patch('/reseaux/reseaux/' + this.reseauData.id, this.reseauData)
        },
  supprimer() {
           if(window.confirm('Attention!!!, voulez-vous vraiment supprimer toutes les données de ce propriétaire ?'))
           { this.$inertia.delete('/reseaux/reseaux/' + this.reseauData.id, this.reseauData);
           }else{return false;}
        },
    },
}
</script>

