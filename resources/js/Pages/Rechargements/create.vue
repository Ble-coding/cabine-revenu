<template>
  <app-layout>
    <template #header> Les rechargements </template>
   <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-4 lg:px-12">
        <div class="w-full">
             <div class="flex justify-between items-center">
                 <button class="hover:bg-green-700 text-white font-bold py-2 px-4 mb-1 rounded">
                    <inertia-link title="liste des rechargements" href="/rechargements/liste">🏬</inertia-link>
                </button>
            </div>
            <hr />
            <div class="mt-4 mb-4">

<div class="mt-10 sm:mt-0">
  <div class="md:grid md:grid-cols-3 md:gap-6">
    <div class="md:col-span-1">
      <div class="px-4 sm:px-0">
        <h3 class="text-lg font-medium leading-6 text-gray-900">Formulaires d'enregistrement</h3>
      <p class="mt-1 text-sm text-gray-600">
       des différentes activités.
        </p>
      </div>
    </div>
    <div class="mt-5 md:mt-0 md:col-span-2">
      <form @submit.prevent="submit">
        <div class="shadow overflow-hidden sm:rounded-md">
          <div class="px-4 py-5 bg-white sm:p-6">
               <div class="grid grid-cols-6 gap-6">
              <div class="col-span-6 sm:col-span-3">
                <label for="datere" class="block text-sm font-medium text-gray-700">Date</label>
                <input v-model="form.datere" type="date" name="datere" id="datere" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
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
                     v-model="form.fournisseur_id"
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
        <!-- <div v-for="(acte, index) in form.actes" v-bind:key="index"> -->
          <div class="grid mt-4 grid-cols-6 gap-6">
            <div class="col-span-6 sm:col-span-6 lg:col-span-2">
              <label for="montant" class="block text-sm font-medium text-gray-700">Montant / FCFA</label>
              <input placeholder="Entrez le montant" v-model="form.montant" type="text" name="montant" id="montant" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                <div class="bg-red-200 text-red-800 p-4 my-2" v-if="$page.props.errors.montant">
                                {{ $page.props.errors.montant }}
                           </div>
            </div>
            <div class="col-span-6 sm:col-span-6 lg:col-span-2">
              <label for="reseau" class="block text-sm font-medium text-gray-700">Réseau</label>
               <!-- <input v-model="form.activities[index].reseau" type="text" name="reseau" :id="'reseau-' + index" autocomplete="reseau" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">-->
               <select class="block appearance-none w-full bg-white border border hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline"
                       id="reseau" v-model="form.reseau">
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
              <input v-model="form.nreference" type="text" name="nreference" id="nreference" placeholder="Entrez le numéro" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                     <div class="bg-red-200 text-red-800 p-4 my-2" v-if="$page.props.errors.nreference">
                                {{ $page.props.errors.nreference }}
                           </div>
            </div>
            </div>
            </div>
              </div>
          <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
            <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md bg-green-800 hover:bg-green-600 text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
              Sauvegarder
            </button>
          </div>
        <!-- </div> -->
      </form>
    </div>
  </div>
</div>

            </div>

        </div>
      </div>
    </div>
  </app-layout>
</template>

<script>
import AppLayout from "./../../Layouts/AppLayout";

export default {
  components: {
    AppLayout,
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
  },
  data() {
    return {
      form: {
        datere: null,
            fournisseur_id: null,
              reseau: null,
              montant: null,
              nreference: null,
      },
    };
  },
  methods: {
    submit() {
      this.$inertia.post("/rechargements", this.form);
    },
  },
};
</script>
