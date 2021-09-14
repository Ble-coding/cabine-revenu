<template>
<app-layout>
    <template #header>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Modification des informations de {{fournisseur.nom}}
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
                    <inertia-link href="/fournisseurs/liste">🔙</inertia-link>
                </button>
                    <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" @submit.prevent="submit">
             <div class="flex justify-between items-center">
               <h1 class="font-bold text-green-700 mb-4">Formulaires de modification des fournisseurs</h1>
            </div>
            <hr />
           <div class="mt-4 mb-4">


               <div class="mt-2 flex flex-wrap -mx-3 mb-6">
                        <div class="w-full md:w-1/3 px-3 mb-4 md:mb-0">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="nom">
                                Nom
                            </label>
                            <input class="shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="nom" type="texte" placeholder="Nom" v-model="fournisseurData.nom">
                         </div>
                        <div class="w-full md:w-1/3 px-3 mb-4 md:mb-0">
                           <label class="block text-gray-700 text-sm font-bold mb-2" for="contact">
                                Contact
                            </label>
                            <input class="shadow appearance-none border rounded  py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="contact" type="texte" placeholder="Contact" v-model="fournisseurData.contact">
                        </div>
                    </div>
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
    // reseaux: {
    //   type: Array,
    //   required: true,
    // },
     fournisseur: {
            type: Object,
            required: true
        },
},
    data() {
        return {
            fournisseurData: this.fournisseur,
        }
    },
     methods: {
        submit() {
            this.$inertia.patch('/fournisseurs/fournisseurs/' + this.fournisseurData.id, this.fournisseurData)
        },
    //        add() {
    //   this.fournisseurData.networks.push({
    //     reseau: null,
    //        fournisseur_id: null,
    //   });
    // },
    // remove() {
    //   this.fournisseurData.networks.pop();
    // },
  supprimer() {
           if(window.confirm('Attention!!!, voulez-vous vraiment supprimer toutes les données de ce propriétaire ?'))
           { this.$inertia.delete('/fournisseurs/fournisseurs/' + this.fournisseurData.id, this.fournisseurData);
           }else{return false;}
        },
    },
}
</script>

