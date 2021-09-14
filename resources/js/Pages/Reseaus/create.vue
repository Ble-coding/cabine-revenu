<template>
  <app-layout>
    <template #header> Les réseaux </template>
   <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-4 lg:px-12">
        <div class="w-full">
          <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" @submit.prevent="submit">
             <div class="flex justify-between items-center">
               <h1 class="font-bold text-green-700 mb-4">Formulaires d'enregistrement des réseaux</h1>
                 <button class="hover:bg-green-700 text-white font-bold py-2 px-4 mb-1 rounded">
                    <inertia-link title="liste des réseaux" href="/reseaux/liste">🏬</inertia-link>
                </button>
            </div>
            <hr />
            <div class="mt-4 mb-4">
              <label class="block text-gray-700 text-sm font-bold mb-2" for="libelle"> Libéllé du réseau </label>
              <input class="shadow appearance-none border rounded w-1/3 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="libelle" type="text" placeholder="Libellé" v-model="form.libelle" />
            <div class="bg-red-200 text-red-800 p-4 my-2" v-if="$page.props.errors.libelle">
                                {{ $page.props.errors.libelle }}
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
  data() {
    return {
      form: {
        libelle: null,
        fournisseur_id: null,
      },
    };
  },
  methods: {
    submit() {
      this.$inertia.post("/reseaux", this.form);
    },
  },
};
</script>
