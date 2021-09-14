<template>
<app-layout>
    <template #header>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Modification des informations du rechargement {{moov.id}}
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
                    <inertia-link href="/rechargements/moov">🔙</inertia-link>
                </button>
                    <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" @submit.prevent="submit">
             <div class="flex justify-between items-center">
               <h1 class="font-bold text-green-700 mb-4">Formulaires de modification des rechargements</h1>
            </div>
            <hr />
           <div class="mt-4 mb-4">
 <div class="shadow overflow-hidden sm:rounded-md">
          <div class="px-4 py-5 bg-white sm:p-6">
               <div class="grid grid-cols-6 gap-6">
              <div class="col-span-6 sm:col-span-3">
                <label for="datere" class="block text-sm font-medium text-gray-700">Date</label>
                <input v-model="moovData.datere" type="date" name="datere" id="datere" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                   <div class="bg-red-200 text-red-800 p-4 my-2" v-if="$page.props.errors.datere">
                                {{ $page.props.errors.datere }}
                           </div>
              </div>

              <div class="col-span-6 sm:col-span-3">
                <label for="fournisseur_id" class="block text-sm font-medium text-gray-700">Fournisseur</label>
                <!--<input type="text" name="fournisseur_id"  class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">-->
                 <select
                    class="block appearance-none w-full bg-white border border hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline"
                   id="fournisseur_id"
                     v-model="moovData.fournisseur_id"
                  >
                    <option v-for="fournisseur in fournisseurs"
          v-bind:key="fournisseur.id" v-bind:value="fournisseur.id">
                      {{ fournisseur.nom}}
                    </option>
                  </select>
                                   <div class="bg-red-200 text-red-800 p-4 my-2" v-if="$page.props.errors.fournisseur_id">
                                {{ $page.props.errors.fournisseur_id }}
                           </div>
              </div>

          </div>
        <!-- <div v-for="(acte, index) in orangeData.actes" v-bind:key="index"> -->
          <div class="grid mt-4 grid-cols-6 gap-6">
            <div class="col-span-6 sm:col-span-6 lg:col-span-2">
              <label for="montant" class="block text-sm font-medium text-gray-700">Montant / FCFA</label>
              <input placeholder="Entrez le montant" v-model="moovData.montant" type="text" name="montant" id="montant" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                <div class="bg-red-200 text-red-800 p-4 my-2" v-if="$page.props.errors.montant">
                                {{ $page.props.errors.montant }}
                           </div>
            </div>
            <div class="col-span-6 sm:col-span-6 lg:col-span-2">
              <label for="reseau" class="block text-sm font-medium text-gray-700">Réseau</label>
               <!-- <input v-model="orangeData.activities[index].reseau" type="text" name="reseau" :id="'reseau-' + index" autocomplete="reseau" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">-->
               <select class="block appearance-none w-full bg-white border border hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline"
                       id="reseau" v-model="moovData.reseau">
                  <option v-for="reseau in reseaux" v-bind:key="reseau.id">
                        {{ reseau.libelle}}
                  </option>
                </select>
                   <div class="bg-red-200 text-red-800 p-4 my-2" v-if="$page.props.errors.reseau">
                                {{ $page.props.errors.reseau }}
                           </div>
              </div>
              <div class="col-span-6 sm:col-span-6 lg:col-span-2">
              <label for="nreference" class="block text-sm font-medium text-gray-700">Numéro de référence</label>
              <input v-model="moovData.nreference" type="text" name="nreference" id="nreference" placeholder="Entrez le numéro" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                     <div class="bg-red-200 text-red-800 p-4 my-2" v-if="$page.props.errors.nreference">
                                {{ $page.props.errors.nreference }}
                           </div>
            </div>
            </div>
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
    reseaux: {
      type: Array,
      required: true,
    },
    fournisseurs: {
      type: Array,
      required: true,
    },
     moov: {
            type: Object,
            required: true
        },
},
    data() {
        return {
            moovData: this.moov,
        }
    },
     methods: {
        submit() {
            this.$inertia.patch('/rechargements/moov/' + this.moovData.id, this.moovData)
        },
    //        add() {
    //   this.orangeData.networks.push({
    //     reseau: null,
    //        fournisseur_id: null,
    //   });
    // },
    // remove() {
    //   this.orangeData.networks.pop();
    // },
  supprimer() {
           if(window.confirm('Attention!!!, voulez-vous vraiment supprimer toutes les données de ce rechargement ?'))
           { this.$inertia.delete('/rechargements/moov/' + this.moovData.id, this.moovData);
           }else{return false;}
        },
    },
}
</script>

