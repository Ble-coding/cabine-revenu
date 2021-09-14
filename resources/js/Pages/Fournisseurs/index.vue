<template>
  <app-layout>
    <template #header> Listes des fournisseurs </template>
    <section class="py-6">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
         <!--<div v-if="$page.props.flash.success" class="text-green-600 bg-green-200 p-4 alert">
                {{ $page.props.flash.success }}
            </div> -->
        <div
          class="py-3"
        >
          <div class="w-2/3 mx-auto">
          <form>
                                    <input
            id="search"
            type="text"
            placeholder="Rechercher"
            v-model="term"
            @keyup="search"
            class="ml-2 px-2 py-1 text-sm rounded border"
          />
           <inertia-link
            href="/fournisseurs/liste"
            title="recharger"
            class="bg-green-500 text-white px-2 py-1 text-sm mt-3 inline-block rounded hover:bg-green-700"
            >♻️</inertia-link
          >
 </form>
  <div class="bg-white shadow-md rounded my-6">
    <table class="text-left w-full border-collapse"> <!--Border collapse doesn't work on this site yet but it's available in newer tailwind versions -->
      <thead>
        <tr>
          <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Identifiant</th>
          <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Nom</th>
                  <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Contact</th>
          <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Action</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="fournisseurs in this.fournisseurList.data"
          v-bind:key="fournisseurs.id" class="hover:bg-grey-lighter">
            <td class="py-4 px-6 border-b border-grey-light">{{ fournisseurs.id}}</td>
          <td class="py-4 px-6 border-b border-grey-light">{{ fournisseurs.nom}}</td>
           <td class="py-4 px-6 border-b border-grey-light">{{ fournisseurs.contact}}</td>
          <td class="py-4 px-6 border-b border-grey-light">
            <a :href="'fournisseurs/edit/' + fournisseurs.id" class="text-grey-lighter font-bold py-1 px-3 rounded text-xs bg-green hover:bg-green-dark">✏️</a>
           <!-- <a href="#" class="text-grey-lighter font-bold py-1 px-3 rounded text-xs bg-blue hover:bg-blue-dark">👁️‍🗨️</a> -->
          </td>
        </tr>
      </tbody>
    </table>
  </div>
          <inertia-link
          :href="link.url"
          class="text-green-700 border-gray-500 p-5"
          v-for="link in this.fournisseurList.links"
          v-bind:key="link.label"
        >
          <span v-bind:class="{ 'text-black': link.active }">
            {{ link.label }}
          </span>
        </inertia-link>
</div>
        </div>
      </div>
    </section>
  </app-layout>
</template>

<script>
import AppLayout from "./../../Layouts/AppLayout";

export default {
  components: {
    AppLayout,
  },

  props: ["fournisseurs", 'monthname'],

  data() {
    return {
      fournisseurList: this.fournisseurs,
       term: "",
    };
  },

    methods: {
    search() {
    this.$inertia.get("/fournisseurs/liste/" + this.term);
    },
  },

  mounted() {
    console.log(this.fournisseurList);
  },
};
</script>
