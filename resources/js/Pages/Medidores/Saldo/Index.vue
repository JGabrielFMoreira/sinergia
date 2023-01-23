<template>
    <app-layout title="Dashboard">
      <template #header>
        <h2 class="tracking-widest font-bold text-lg text-gray-800 leading-tight">
          Saldo de Medidores
        </h2>
      </template>
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <form id="formPesquisa" @submit.prevent="submitPesquisa">
          <div class="grid grid-cols-12">
            <div class="flex justify-end col-span-2">
              <div
                class="
                  input-group
                  relative
                  flex flex-wrap
                  items-stretch
                  w-full
                  mb-1
                "
              >
                <input
                  type="search"
                  v-model="formPesquisa.pesquisar"
                  class="
                    mt-6
                    form-control
                    relative
                    flex-auto
                    min-w-0
                    block
                    w-full
                    px-3
                    py-1.5
                    text-xs
                    font-normal
                    text-gray-700
                    bg-white bg-clip-padding
                    border border-solid border-gray-300
                    rounded
                    transition
                    ease-in-out
                    m-0
                    focus:text-gray-700
                    focus:bg-white
                    focus:border-blue-600
                    focus:outline-none
                  "
                  placeholder="Pesquisar"
                  aria-label="Search"
                  aria-describedby="button-addon2"
                />
              </div>
            </div>
  
            <div class="col-span-7">
              <button
                form="formPesquisa"
                type="submit"
                class="
                  mt-6
                  ml-2
                  btn
                  py-0.5
                  inline-block
                  px-3
                  bg-blue-800
                  text-white
                  rounded
                  shadow-mdcd
                  hover:bg-blue-600 hover:shadow-lg
                  focus:bg-blue-600
                  focus:shadow-lg
                  focus:outline-none
                  focus:ring-0
                  active:bg-blue-800 active:shadow-lg
                  transition
                  duration-150
                  ease-in-out
                  flex
                  items-center
                "
              >
                <magnify-icon />
              </button>
            </div>
          </div>
        </form>
        <div class="overflow-x-auto w-full">
          <table
            class="
              mx-auto
              max-w-7xl
              w-full
              whitespace-nowrap
              rounded-lg
              bg-white
              divide-y divide-gray-300
              overflow-hidden
            "
          >
            <thead class="bg-gray-900">
              <tr class="text-white text-center">
                <th class="font-semibold text-xs uppercase">EQUIPE</th>
                <th class="font-semibold text-xs uppercase">MEDIDOR RECEBIDO</th>
                <th class="font-semibold text-xs uppercase">TIPO DE MEDIDOR</th>
                <th class="font-semibold text-xs uppercase">STATUS ATUAL</th>
                <th class="font-semibold text-xs uppercase">DATA LANÇADO</th>
                <th class="font-semibold text-xs uppercase px-2 py-2">AÇÕES</th>
              </tr>
            </thead>
            <tbody
              v-for="medidor in medidores.data"
              :key="medidor.id"
              class="divide-y divide-gray-200"
            >
              <tr class="text-center">
                <td class="text-xs px-2 py-2 text-center">
                  <span> {{ medidor.equipe.name }} </span>
                </td>
                <td class="text-xs px-2 py-2 text-center">
                  <span> {{ medidor.numero }} </span>
                </td>
                <td class="text-xs px-2 py-2 text-center">
                  <span> {{ medidor.tipo }} </span>
                </td>
                <td class="text-xs px-2 py-2 text-center">
                  <span
                    :class="{
                      'bg-red-600 text-white p-1 rounded':
                        medidor.status === 'DISPONÍVEL',
                      'bg-green-600 text-white p-1 rounded':
                        medidor.status === 'INSTALADO',
                    }"
                  >
                    {{ medidor.status }}
                  </span>
                </td>
                <td class="text-xs px-2 py-2 text-center">
                  <span> {{ medidor.created_at }} </span>
                </td>
                <td class="text-xs px-2 py-2">
                  <Link
                    href=""
                    class="
                      ml-3
                      hover:underline
                      bg-blue-100
                      text-blue-800 text-xs
                      font-semibold
                      mr-2
                      px-2.5
                      py-0.5
                      rounded
                      dark:bg-red-200 dark:text-red-900
                    "
                    >VISUALIZAR</Link
                  >
                </td>
              </tr>
            </tbody>
          </table>
        </div>
        <div class="mt-2 flex flex-col items-center">
                    <!-- Help text -->
                    <span class="text-sm text-gray-700 dark:text-black">
            Visualizando
            <span class="font-semibold text-gray-900 dark:text-black">{{
              medidores.current_page
            }}</span>
            de
            <span class="font-semibold text-gray-900 dark:text-black">{{
              medidores.last_page
            }}</span>
            Páginas
          </span>
          <!-- Buttons -->
          <div class="inline-flex xs:mt-0">
            <Link
              :href="medidores.prev_page_url"
              class="
                py-2
                px-4
                text-sm
                font-medium
                text-white
                bg-blue-800
                rounded-l
                hover:bg-blue-900
                dark:bg-blue-800
                dark:border-blue-700
                dark:text-blue-400
                dark:hover:bg-blue-700
                dark:hover:text-white
              "
            >
              Anterior
            </Link>
            <Link
              :href="medidores.next_page_url"
              class="
                py-2
                px-4
                text-sm
                font-medium
                text-white
                bg-blue-800
                rounded-r
                border-0 border-l border-blue-700
                hover:bg-blue-900
                dark:bg-blue-800
                dark:border-blue-700
                dark:text-blue-400
                dark:hover:bg-blue-700
                dark:hover:text-white
              "
            >
              Próximo
            </Link>
          </div>
        </div>
      </div>
    </app-layout>
  </template>
  
  <script>
  import { defineComponent } from "vue";
  import AppLayout from "@/Layouts/AppLayout.vue";
  import { Head, Link } from "@inertiajs/inertia-vue3";
  import ListItem from "@/Components/ListItem";
  import DialogModal from "@/Jetstream/DialogModal";
  import JetValidationErrors from "@/Jetstream/ValidationErrors.vue";
  import MagnifyIcon from "vue-material-design-icons/Magnify.vue";
  
  export default defineComponent({
    components: {
      AppLayout,
      Head,
      Link,
      ListItem,
      DialogModal,
      JetValidationErrors,
      MagnifyIcon,
    },
  
    props: {
      medidores: Array,
    },
    data() {
      return {
        form: this.$inertia.form({
          equipe: "",
          tipo: "",
        }),
  
        showModal: false,
  
        formPesquisa: this.$inertia.form({
          pesquisar: "",
        }),
      };
    },
    methods: {
      submit() {
        this.form.post(this.route("medidores.store"));
        this.showModal = false;
      },
      submitPesquisa() {
        this.formPesquisa.get(this.route("medicao_saldo.index"));
      },
    },
  });
  </script>