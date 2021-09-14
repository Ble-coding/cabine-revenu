<template>
  <app-layout>
    <template #header> Les fournisseurs </template>
   <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-4 lg:px-12">
        <div class="w-full">
          <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" @submit.prevent="submit">
             <div class="flex justify-between items-center">
               <h1 class="font-bold text-green-700 mb-4">Formulaires d'enregistrement des fournisseurs</h1>
                 <button class="hover:bg-green-700 text-white font-bold py-2 px-4 mb-1 rounded">
                    <inertia-link title="liste des fournisseurs" href="/fournisseurs/liste">🏬</inertia-link>
                </button>
            </div>
            <hr />

           <div class="mt-10 sm:mt-0">
    <div class="mt-5 md:mt-0 md:col-span-2">
        <div class="shadow overflow-hidden sm:rounded-md">
          <div class="px-4 py-5 bg-white sm:p-6">
            <div class="grid grid-cols-6 gap-6">
              <div class="col-span-6 sm:col-span-3">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="nom">Nom</label>
                <input v-model="form.nom" type="text" name="nom" id="nom" autocomplete="given-name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                <div class="bg-red-200 text-red-800 p-4 my-2" v-if="$page.props.errors.nom">
                                {{ $page.props.errors.nom }}
                           </div>
              </div>

              <div class="col-span-6 sm:col-span-3">
                <label for="contact" class="block text-gray-700 text-sm font-bold mb-2">Contact</label>
                <input v-model="form.contact" type="tel" name="contact" id="contact" autocomplete="family-name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                  <div class="bg-red-200 text-red-800 p-4 my-2" v-if="$page.props.errors.contact">
                                {{ $page.props.errors.contact }}
                           </div>
              </div>
            </div>
          </div>

        </div>
    </div>
  </div>

            <button class="block bg-green-800 hover:bg-green-600 text-white py-2 px-3 mt-3 rounded" type="submit">Sauvegarder</button>
          </form>
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
  },
  data() {
    return {
      form: {
        nom: null,
        contact: null,
        //  networks: [
        //   {
        //       reseau: null,
        //    fournisseur_id: null,
        //   },
        // ],
      },
    };
  },
  methods: {
    submit() {
      this.$inertia.post("/fournisseurs", this.form);
    },
    // add() {
    //   this.form.networks.push({
    //     reseau: null,
    //        fournisseur_id: null,
    //   });
    // },
    // remove() {
    //   this.form.networks.pop();
    // },
  },
};
</script>
