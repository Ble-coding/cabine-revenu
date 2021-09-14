<template>
  <app-layout>
    <template #header> Listes des rechargements <strong>Orange</strong> </template>
    <section class="py-6">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">


    <div class="py-1">
    <inertia-link
            href="/rechargements/orange"
            title="recharger"
            class="bg-green-500 text-white px-2 py-1 text-sm mt-3 inline-block rounded hover:bg-green-700"
            >♻️</inertia-link
          >
       <div class="bg-white rounded shadow">
        <div class="flex flex-col h-screen">
         <div class="flex-grow overflow-auto">
    <table class="text-left w-full border-collapse"> <!--Border collapse doesn't work on this site yet but it's available in newer tailwind versions -->
      <thead>
        <tr>
            <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Date</th>
          <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Numéro de référence</th>
          <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Fournisseur</th>
        <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Montant</th>
        <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Bénéfices</th>
          <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Action</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="oranges in this.orangeList.data"
          v-bind:key="oranges.id" class="hover:bg-grey-lighter">
                     <td class="py-4 px-6 border-b border-grey-light">{{ oranges.datere}}</td>
            <td class="py-4 px-6 border-b border-grey-light">{{ oranges.nreference}}</td>
 <td class="py-4 px-6 border-b border-grey-light">{{ oranges.fournisseur.nom}}</td>
           <td class="py-4 px-6 border-b border-grey-light">{{ oranges.montant}}</td>
                 <td class="py-4 px-6 border-b border-grey-light">
                 {{ (oranges.ptotli = oranges.montant * 0.04) }}</td>
          <td class="py-4 px-6 border-b border-grey-light">
            <a :href="'orange/edit/' + oranges.id" class="text-grey-lighter font-bold py-1 px-3 rounded text-xs bg-green hover:bg-green-dark">✏️</a>
          </td>
        </tr>
                          <tr>
                               <td class="py-4 px-6 border-b border-grey-light text-center"></td>
            <td class="py-4 px-6 border-b border-grey-light text-center"></td>
            <td class="py-4 px-6 border-b border-grey-light  text-center">Montant total</td>
               <td class="py-4 px-6 border-b border-grey-light  text-center">{{sumTotalOrange}}</td>
            <td class="py-4 px-6 border-b border-grey-light  text-center">TOTAL Bénéfice</td>
            <td class="py-4 px-6 border-b border-grey-light  text-center">{{total}}</td>
          </tr>

      </tbody>
        <inertia-link
          :href="link.url"
          class="mt-3 text-green-700 border-gray-500 p-5"
          v-for="link in this.orangeList.links"
          v-bind:key="link.label"
        >
          <span v-bind:class="{ 'text-black': link.active }">
            {{ link.label }}
          </span>
        </inertia-link>
    </table>
         </div>
        </div>
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

  props: ["oranges", "sumTotalOrange"],

  data() {
    return {
     orangeList: this.oranges,
      // reseauList: this.reseaus,
    //  form: {
    //     fromDate: null,
    //         toDate: null,
    //   },
    };
  },
  // methods: {
  //   submit() {
  //   this.$inertia.post("/rechargements/orange/", this.form);
  //   },
  // },

  computed: {
        total() {
            return this.orangeList.data.reduce( (ab, oranges) => {
                return ab + (oranges.ptotli = oranges.montant * 0.04)
            }, 0)
        },
    },


  mounted() {
    console.log(this.orangeList);
  },
};
</script>
