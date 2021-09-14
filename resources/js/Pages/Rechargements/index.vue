<template>
  <app-layout>
    <template #header> Listes des rechargements </template>
    <section class="py-6">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
         <!--<div v-if="$page.props.flash.success" class="text-green-600 bg-green-200 p-4 alert">
                {{ $page.props.flash.success }}
            </div> -->
        <div
          class="py-4"
        >
        <div class="flex flex-col lg:flex-row w-full lg:space-x-2 space-y-2 lg:space-y-0 mb-2 lg:mb-4">
  <div class="w-full lg:w-1/3">
             <div class="widget w-full p-4 rounded-lg bg-white border border-gray-100 dark:bg-gray-900 dark:border-gray-800">
              <div class="flex flex-row items-center justify-between">
               <div class="flex flex-col">
               <div class="text-xs uppercase font-light text-black">
                   ORANGE
                </div>
                <inertia-link href="/rechargements/orange" class="ml-4 text-sm text-gray-700 underline">
          {{oranges * 0.04}}
                </inertia-link>
               </div>
               🖧
                  </div>
                     </div>
                        </div>
                          <div class="w-full lg:w-1/3">
             <div class="widget w-full p-4 rounded-lg bg-white border border-gray-100 dark:bg-gray-900 dark:border-gray-800">
              <div class="flex flex-row items-center justify-between">
               <div class="flex flex-col">
               <div class="text-xs uppercase font-light text-black">
                   MTN
                </div>
                <inertia-link href="/rechargements/mtn" class="ml-4 text-sm text-gray-700 underline">
            {{mtns * 0.04}}
                </inertia-link>
               </div>
                🌐
                  </div>
                     </div>
                        </div>
                         <div class="w-full lg:w-1/3">
             <div class="widget w-full p-4 rounded-lg bg-white border border-gray-100 dark:bg-gray-900 dark:border-gray-800">
              <div class="flex flex-row items-center justify-between">
               <div class="flex flex-col">
               <div class="text-xs uppercase font-light text-black">
                   MOOV
                </div>
                <inertia-link href="/rechargements/moov" class="ml-4 text-sm text-gray-700 underline">
             {{moovs * 0.04}}
                </inertia-link>
               </div>
                📶
                  </div>
                     </div>
                        </div>

                            </div>
          <div class="w-2/3 mx-auto">
        <!-- <form>
                                    <input
            id="search"
            type="text"
            placeholder="Rechercher"
            v-model="term"
            @keyup="search"
            class="ml-2 px-2 py-1 text-sm rounded border"
          />
           <inertia-link
            href="/rechargements/liste"
            title="recharger"
            class="bg-green-500 text-white px-2 py-1 text-sm mt-3 inline-block rounded hover:bg-green-700"
            >♻️</inertia-link
          >
 </form> -->
  <!--<div class="bg-white shadow-md rounded my-6">
   <div class="flex flex-col h-screen">
    <div class="flex-grow overflow-auto">
    <table class="text-left w-full border-collapse">
      <thead>
        <tr>
          <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Identifiant</th>
          <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Date</th>
                  <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Fournisseurs</th>
          <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Action</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="rechargements in this.rechargementList.data"
          v-bind:key="rechargements.id" class="hover:bg-grey-lighter">
            <td class="py-4 px-6 border-b border-grey-light">{{ rechargements.id}}</td>
          <td class="py-4 px-6 border-b border-grey-light">{{ rechargements.datere}}</td>
           <td class="py-4 px-6 border-b border-grey-light">{{ rechargements.fournisseur.nom}}</td>
          <td class="py-4 px-6 border-b border-grey-light">
            <a href="#" class="text-grey-lighter font-bold py-1 px-3 rounded text-xs bg-green hover:bg-green-dark">✏️</a>
           <a href="#" class="text-grey-lighter font-bold py-1 px-3 rounded text-xs bg-blue hover:bg-blue-dark">👁️‍🗨️</a>
          </td>
        </tr>
      </tbody>
        <inertia-link
          :href="link.url"
          class="mt-3 text-green-700 border-gray-500 p-5"
          v-for="link in this.rechargementList.links"
          v-bind:key="link.label"
        >
          <span v-bind:class="{ 'text-black': link.active }">
            {{ link.label }}
          </span>
        </inertia-link>
    </table>
  </div>
        </div>
      </div> -->
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

  props: ["rechargements","oranges", "mtns", "moovs", 'monthname'],

  data() {
    return {
      rechargementList: this.rechargements,
       term: "",
    };
  },

    methods: {
    search() {
    this.$inertia.get("/rechargements/liste/" + this.term);
    },
  },

  mounted() {
    console.log(this.rechargementList);
  },
};
</script>
