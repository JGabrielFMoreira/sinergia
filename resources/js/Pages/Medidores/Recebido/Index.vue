<template>
    <app-layout title="Dashboard">
      <template #header>
        <h2 class="tracking-widest font-bold text-lg text-gray-800 leading-tight">
          Gestão de Medidores - Recebidos
        </h2>
        <DialogModal :show="showModal">
          <template #content>
            <list-item
              class="
                mb-8
                items-center
                px-4
                py-2
                bg-gray-800
                border border-transparent
                rounded-md
                font-semibold
                text-xs text-white
                uppercase
                tracking-widest
              "
            >
              ENTREGA DE MEDIDORES</list-item
            >
            <form id="form" @submit.prevent="submit">
              <div class="grid grid-cols-12 gap-2">
                <div class="col-span-4">
                  <label
                    for="equipe"
                    class="
                      block
                      text-xs text-black
                      uppercase
                      font-bold
                      tracking-widest
                    "
                    >EQUIPE</label
                  >
                  <select
                    required
                    v-model="form.equipe"
                    style="width: 100%"
                    name="equipe"
                    id="equipe"
                    class="
                      mt-1
                      focus:bg-white focus:border-blue-400
                      shadow-sm
                      text-xs text-black
                      tracking-widest
                      border-gray-200
                      bg-gray-100
                      rounded-md
                    "
                  >
                    <option
                      v-for="equipe in equipes"
                      :key="equipe.id"
                      :value="equipe.id"
                    >
                      {{ equipe.name }}
                    </option>
                  </select>
                </div>
                <div class="col-span-4">
                  <label
                    for="tipo"
                    class="
                      block
                      text-xs text-black
                      uppercase
                      font-bold
                      tracking-widest
                    "
                    >TIPO DE MEDIDOR</label
                  >
                  <select
                    required
                    v-model="form.tipo"
                    style="width: 100%"
                    name="tipo"
                    id="tipo"
                    class="
                      mt-1
                      focus:bg-white focus:border-blue-400
                      shadow-sm
                      text-xs text-black
                      tracking-widest
                      border-gray-200
                      bg-gray-100
                      rounded-md
                    "
                  >
                    <option value="MONOFASICO">MONOFÁSICO</option>
                    <option value="BIFASICO">BIFÁSICO</option>
                    <option value="TRIFASICO">TRIFÁSICO</option>
                  </select>
                </div>
                <div class="col-span-4">
                  <label
                    for="date"
                    class="
                      block
                      text-xs text-black
                      uppercase
                      font-bold
                      tracking-widest
                    "
                    >DATA ENTREGA</label
                  >
                  <input
                    required
                    v-model="form.date"
                    style="width: 100%"
                    type="date"
                    name="date"
                    id="date"
                    class="
                      mt-1
                      focus:bg-white focus:border-blue-400
                      shadow-sm
                      text-xs text-black
                      tracking-widest
                      border-gray-200
                      bg-gray-100
                      rounded-md
                    "
                  />
                </div>
                <div class="mt-8 col-span-3">
                  <label
                    for="medidor_1"
                    class="
                      block
                      text-xs text-black
                      uppercase
                      font-bold
                      tracking-widest
                    "
                    >MEDIDOR 1</label
                  >
                  <input
                    required
                    v-model="form.medidor_1"
                    style="width: 100%"
                    type="text"
                    name="medidor_1"
                    id="medidor_1"
                    class="
                      mt-1
                      focus:bg-white focus:border-blue-400
                      shadow-sm
                      text-xs text-black
                      tracking-widest
                      border-gray-200
                      bg-gray-100
                      rounded-md
                    "
                  />
                </div>
                <div class="mt-8 col-span-3">
                  <label
                    for="medidor_2"
                    class="
                      block
                      text-xs text-black
                      uppercase
                      font-bold
                      tracking-widest
                    "
                    >MEDIDOR 2</label
                  >
                  <input
                    v-model="form.medidor_2"
                    style="width: 100%"
                    type="text"
                    name="medidor_2"
                    id="medidor_2"
                    class="
                      mt-1
                      focus:bg-white focus:border-blue-400
                      shadow-sm
                      text-xs text-black
                      tracking-widest
                      border-gray-200
                      bg-gray-100
                      rounded-md
                    "
                  />
                </div>
                <div class="mt-8 col-span-3">
                  <label
                    for="medidor_3"
                    class="
                      block
                      text-xs text-black
                      uppercase
                      font-bold
                      tracking-widest
                    "
                    >MEDIDOR 3</label
                  >
                  <input
                    v-model="form.medidor_3"
                    style="width: 100%"
                    type="text"
                    name="medidor_3"
                    id="medidor_3"
                    class="
                      mt-1
                      focus:bg-white focus:border-blue-400
                      shadow-sm
                      text-xs text-black
                      tracking-widest
                      border-gray-200
                      bg-gray-100
                      rounded-md
                    "
                  />
                </div>
                <div class="mt-8 col-span-3">
                  <label
                    for="medidor_4"
                    class="
                      block
                      text-xs text-black
                      uppercase
                      font-bold
                      tracking-widest
                    "
                    >MEDIDOR 4</label
                  >
                  <input
                    v-model="form.medidor_4"
                    style="width: 100%"
                    type="text"
                    name="medidor_4"
                    id="medidor_4"
                    class="
                      mt-1
                      focus:bg-white focus:border-blue-400
                      shadow-sm
                      text-xs text-black
                      tracking-widest
                      border-gray-200
                      bg-gray-100
                      rounded-md
                    "
                  />
                </div>
                <div class="col-span-3">
                  <label
                    for="medidor_5"
                    class="
                      block
                      text-xs text-black
                      uppercase
                      font-bold
                      tracking-widest
                    "
                    >MEDIDOR 5</label
                  >
                  <input
                    v-model="form.medidor_5"
                    style="width: 100%"
                    type="text"
                    name="medidor_5"
                    id="medidor_5"
                    class="
                      mt-1
                      focus:bg-white focus:border-blue-400
                      shadow-sm
                      text-xs text-black
                      tracking-widest
                      border-gray-200
                      bg-gray-100
                      rounded-md
                    "
                  />
                </div>
                <div class="col-span-3">
                  <label
                    for="medidor_6"
                    class="
                      block
                      text-xs text-black
                      uppercase
                      font-bold
                      tracking-widest
                    "
                    >MEDIDOR 6</label
                  >
                  <input
                    v-model="form.medidor_6"
                    style="width: 100%"
                    type="text"
                    name="medidor_6"
                    id="medidor_6"
                    class="
                      mt-1
                      focus:bg-white focus:border-blue-400
                      shadow-sm
                      text-xs text-black
                      tracking-widest
                      border-gray-200
                      bg-gray-100
                      rounded-md
                    "
                  />
                </div>
                <div class="col-span-3">
                  <label
                    for="medidor_7"
                    class="
                      block
                      text-xs text-black
                      uppercase
                      font-bold
                      tracking-widest
                    "
                    >MEDIDOR 7</label
                  >
                  <input
                    v-model="form.medidor_7"
                    style="width: 100%"
                    type="text"
                    name="medidor_7"
                    id="medidor_7"
                    class="
                      mt-1
                      focus:bg-white focus:border-blue-400
                      shadow-sm
                      text-xs text-black
                      tracking-widest
                      border-gray-200
                      bg-gray-100
                      rounded-md
                    "
                  />
                </div>
                <div class="col-span-3">
                  <label
                    for="medidor_8"
                    class="
                      block
                      text-xs text-black
                      uppercase
                      font-bold
                      tracking-widest
                    "
                    >MEDIDOR 8</label
                  >
                  <input
                    v-model="form.medidor_8"
                    style="width: 100%"
                    type="text"
                    name="medidor_8"
                    id="medidor_8"
                    class="
                      mt-1
                      focus:bg-white focus:border-blue-400
                      shadow-sm
                      text-xs text-black
                      tracking-widest
                      border-gray-200
                      bg-gray-100
                      rounded-md
                    "
                  />
                </div>
                <div class="col-span-3">
                  <label
                    for="medidor_9"
                    class="
                      block
                      text-xs text-black
                      uppercase
                      font-bold
                      tracking-widest
                    "
                    >MEDIDOR 9</label
                  >
                  <input
                    v-model="form.medidor_9"
                    style="width: 100%"
                    type="text"
                    name="medidor_9"
                    id="medidor_9"
                    class="
                      mt-1
                      focus:bg-white focus:border-blue-400
                      shadow-sm
                      text-xs text-black
                      tracking-widest
                      border-gray-200
                      bg-gray-100
                      rounded-md
                    "
                  />
                </div>
                <div class="col-span-3">
                  <label
                    for="medidor_10"
                    class="
                      block
                      text-xs text-black
                      uppercase
                      font-bold
                      tracking-widest
                    "
                    >MEDIDOR 10</label
                  >
                  <input
                    v-model="form.medidor_10"
                    style="width: 100%"
                    type="text"
                    name="medidor_10"
                    id="medidor_10"
                    class="
                      mt-1
                      focus:bg-white focus:border-blue-400
                      shadow-sm
                      text-xs text-black
                      tracking-widest
                      border-gray-200
                      bg-gray-100
                      rounded-md
                    "
                  />
                </div>
                <div class="col-span-3">
                  <label
                    for="medidor_11"
                    class="
                      block
                      text-xs text-black
                      uppercase
                      font-bold
                      tracking-widest
                    "
                    >MEDIDOR 11</label
                  >
                  <input
                    v-model="form.medidor_11"
                    style="width: 100%"
                    type="text"
                    name="medidor_11"
                    id="medidor_11"
                    class="
                      mt-1
                      focus:bg-white focus:border-blue-400
                      shadow-sm
                      text-xs text-black
                      tracking-widest
                      border-gray-200
                      bg-gray-100
                      rounded-md
                    "
                  />
                </div>
                <div class="col-span-3">
                  <label
                    for="medidor_12"
                    class="
                      block
                      text-xs text-black
                      uppercase
                      font-bold
                      tracking-widest
                    "
                    >MEDIDOR 12</label
                  >
                  <input
                    v-model="form.medidor_12"
                    style="width: 100%"
                    type="text"
                    name="medidor_12"
                    id="medidor_12"
                    class="
                      mt-1
                      focus:bg-white focus:border-blue-400
                      shadow-sm
                      text-xs text-black
                      tracking-widest
                      border-gray-200
                      bg-gray-100
                      rounded-md
                    "
                  />
                </div>
              </div>
            </form>
          </template>
  
          <template #footer>
            <div class="col-span-12 flex justify-end">
              <a
                @click="showModal = false"
                class="
                  inline-flex
                  items-center
                  px-4
                  py-2
                  bg-red-700
                  border border-transparent
                  rounded-md
                  font-semibold
                  text-xs text-white
                  uppercase
                  tracking-widest
                  hover:bg-red-400
                  active:bg-red-600
                  focus:outline-none focus:bg-red-400 focus:shadow-outline-gray
                  transition
                  ease-in-out
                  duration-150
                "
                >Cancelar</a
              >
              <button
                form="form"
                type="submit"
                class="
                  ml-2
                  inline-flex
                  items-center
                  px-4
                  py-2
                  bg-green-700
                  border border-transparent
                  rounded-md
                  font-semibold
                  text-xs text-white
                  uppercase
                  tracking-widest
                  hover:bg-green-400
                  active:bg-green-600
                  focus:outline-none focus:bg-green-400 focus:shadow-outline-gray
                  transition
                  ease-in-out
                  duration-150
                "
              >
                Confirmar
              </button>
            </div>
          </template>
        </DialogModal>
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
            <div class="mt-6 flex justify-end col-span-3">
              <a
                @click="showModal = true"
                type="submit"
                class="
                  mb-1
                  ml-2
                  inline-flex
                  items-center
                  px-4
                  bg-gray-800
                  border border-transparent
                  rounded-md
                  font-semibold
                  text-xs text-white
                  uppercase
                  tracking-widest
                  hover:bg-gray-700
                  active:bg-gray-900
                  focus:outline-none
                  focus:border-gray-900
                  focus:shadow-outline-gray
                  transition
                  ease-in-out
                  duration-150
                "
              >
                REGISTRAR
              </a>
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
                <th class="font-semibold text-xs uppercase">FISCAL</th>
                <th class="font-semibold text-xs uppercase">
                  MEDIDORES RECEBIDOS
                </th>
                <th class="font-semibold text-xs uppercase">TIPO DE MEDIDOR</th>
                <th class="font-semibold text-xs uppercase">DATA RECEBIMENTO</th>
                <th class="font-semibold text-xs uppercase px-2 py-2">AÇÕES</th>
              </tr>
            </thead>
            <tbody
              v-for="entrega in entregas.data"
              :key="entrega.id"
              class="divide-y divide-gray-200"
            >
              <tr class="text-center">
                <td class="text-xs px-2 py-2 text-center">
                  <span> {{ entrega.equipe.name }} </span>  
                </td>
                <td class="text-xs px-2 py-2 text-center">
                  <span> {{ entrega.equipe.fiscal.name }} </span>
                </td>
                <td class="text-xs px-2 py-2 text-center">
                  <span> {{ entrega.medidores_recebidos }} </span>
                </td>
                <td class="text-xs px-2 py-2 text-center">
                  <span> {{ entrega.tipo_medidor }} </span>
                </td>
                <td class="text-xs px-2 py-2 text-center">
                  <span> {{ entrega.created_at }} </span>
                </td>
                <td class="text-xs px-2 py-2">
                  <Link
                    :href="route('medicao_recebido.show', entrega.id)"
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
              entregas.current_page
            }}</span>
            de
            <span class="font-semibold text-gray-900 dark:text-black">{{
              entregas.last_page
            }}</span>
            Páginas
          </span>
          <!-- Buttons -->
          <div class="inline-flex xs:mt-0">
            <Link
              :href="entregas.prev_page_url"
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
              :href="entregas.next_page_url"
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
      entregas: Array,
      equipes: Array,
    },
    data() {
      return {
        form: this.$inertia.form({
          equipe: "",
          tipo: "",
          date: "",
          medidor_1: "",
          medidor_2: "",
          medidor_3: "",
          medidor_4: "",
          medidor_5: "",
          medidor_6: "",
          medidor_7: "",
          medidor_8: "",
          medidor_9: "",
          medidor_10: "",
          medidor_11: "",
          medidor_12: "",
        }),
  
        showModal: false,
  
        formPesquisa: this.$inertia.form({
          pesquisar: "",
        }),
      };
    },
    methods: {
      submit() {
        this.form.post(this.route("medicao_recebido.store"));
        this.showModal = false;
      },
      submitPesquisa() {
        this.formPesquisa.get(this.route("medicao_recebido.index"));
      },
    },
  });
  </script>