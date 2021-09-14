<template>
  <app-layout>
    <template #header> Listes des réseaux </template>
    <section class="py-6">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
         <!--<div v-if="$page.props.flash.success" class="text-green-600 bg-green-200 p-4 alert">
                {{ $page.props.flash.success }}
            </div> -->

        <div
          class="py-3"
        >
          <div class="w-2/3 mx-auto">
  <div class="bg-white shadow-md rounded my-6">
    <table class="text-left w-full border-collapse"> <!--Border collapse doesn't work on this site yet but it's available in newer tailwind versions -->
      <thead>
        <tr>
          <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Reseaux</th>
          <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Action</th>
        </tr>
      </thead>
      <tbody>
        <tr  v-for="reseaux in this.reseauList.data"
          v-bind:key="reseaux.id" class="hover:bg-grey-lighter">
          <td class="py-4 px-6 border-b border-grey-light">{{ reseaux.libelle}}</td>
          <td class="py-4 px-6 border-b border-grey-light">
            <a  :href="'reseaux/edit/' + reseaux.id" class="text-grey-lighter font-bold py-1 px-3 rounded text-xs bg-green hover:bg-green-dark">✏️</a>
            <!--<a href="#" class="text-grey-lighter font-bold py-1 px-3 rounded text-xs bg-blue hover:bg-blue-dark">👁️‍🗨️</a>-->
          </td>
        </tr>
      </tbody>
    </table>
  </div>
          <inertia-link
          :href="link.url"
          class="text-green-700 border-gray-500 p-5"
          v-for="link in this.reseauList.links"
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

  props: ["reseaux"],

  data() {
    return {
      reseauList: this.reseaux,
    };
  },

  mounted() {
    console.log(this.reseauList);
  },
};
</script>
