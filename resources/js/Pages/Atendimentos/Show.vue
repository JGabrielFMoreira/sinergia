<template>
    <app-layout title="Dashboard">
      <template #header>
        <div class="flex justify-end">
          <Link
            :href="route('atendimentos.index')"
            class="
              inline-flex
              items-center
              px-4
              py-1
              bg-blue-900
              border border-transparent
              rounded-md
              font-semibold
              text-xs text-white
              uppercase
              tracking-widest
              hover:bg-blue-600
              active:bg-blue-900
              focus:outline-none focus:border-blue-900 focus:shadow-outline-gray
              transition
              ease-in-out
              duration-150
            "
            >VOLTAR</Link
          >
        </div>
        <DialogModal :show="showModal">
          <template #content>
            <list-item
              class="
                mb-8
                items-center
                px-4
                py-2
                bg-blue-900
                border border-transparent
                rounded-md
                font-semibold
                text-xs text-white
                uppercase
                tracking-widest
              "
            >
              EDIÇÃO DE ATENDIMENTO</list-item
            >
            <form id="form" @submit.prevent="submit">
              <div class="grid grid-cols-12 gap-2">

                <div class="col-span-3">
                  <label
                    for="uc"
                    class="
                      block
                      text-xs text-black
                      uppercase
                      font-bold
                      tracking-widest
                    "
                    >UC ATENDIDA</label
                  >
                  <input
                    required
                    v-model="form.uc_atendida"
                    style="width: 100%"
                    type="text"
                    name="uc"
                    id="uc"
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
                    v-model="form.equipe_id"
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
                  bg-blue-900
                  border border-transparent
                  rounded-md
                  font-semibold
                  text-xs text-white
                  uppercase
                  tracking-widest
                  hover:bg-blue-400
                  active:bg-blue-600
                  focus:outline-none focus:bg-blue-400 focus:shadow-outline-gray
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
        
        <div class="mt-6 overflow-x-auto w-full">
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
            <thead class="bg-blue-900">
              <tr class="text-white text-center">
                <th class="font-semibold text-xs uppercase">EQUIPE</th>
                <th class="font-semibold text-xs uppercase">ATENDENTE</th>
                <th class="font-semibold text-xs uppercase">UC CONSULTADA</th>
                <th class="font-semibold text-xs uppercase">DATA ATENDIMENTO</th>
                <th class="font-semibold text-xs uppercase">
                  PRIMEIRA CONSULTA ?
                </th>
                <th class="font-semibold text-xs uppercase px-2 py-2">AÇÕES</th>
              </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
              <tr class="text-center">
                <td class="text-xs px-2 py-2 text-center">
                  <span> {{ atendimento.equipe.name }} </span>
                </td>
                <td class="text-xs px-2 py-2 text-center">
                  <span> {{ atendimento.user.name }} </span>
                </td>
                <td class="text-xs px-2 py-2 text-center">
                  <span> {{ atendimento.uc_atendida }} </span>
                </td>
                <td class="text-xs px-2 py-2 text-center">
                  <span> {{ atendimento.created_at }} </span>
                </td>
                <td class="text-xs px-2 py-2 text-center">
                  <span
                    :class="{
                      'bg-blue-600 text-white p-1 rounded':
                        atendimento.primeira_consulta === 'SIM',
                      'bg-gray-500 text-white p-1 rounded':
                        atendimento.primeira_consulta === 'NAO',
                    }"
                  >
                    {{ atendimento.primeira_consulta }}
                  </span>
                </td>
                <td class="text-xs px-2 py-2">
                  <button
                    @click="showModal = true"
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
                  >
                    EDITAR
                  </button>
                </td>
              </tr>
            </tbody>
          </table>
          <div class="flex justify-end">
            <button
              @click="showModalDelete = true"
              class="
                mt-4
                inline-flex
                items-center
                px-4
                py-1
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
            >
              Excluir
            </button>
            <DialogModal :show="showModalDelete">
              <template #content>
                <form id="formDelete" @submit.prevent="submitDelete">
                  <div class="p-2 x-2 text-center">
                    <span
                      class="
                        font-semibold
                        text-xs text-gray-600
                        uppercase
                        tracking-widest
                      "
                      >Tem certeza que deseja excluir esse atendimento ?</span
                    >
                    <span
                      class="
                        ml-2
                        font-bold
                        text-xs text-black
                        uppercase
                        tracking-widest
                      "
                    >
                    </span>
                  </div>
                </form>
              </template>
              <template #footer>
                <div class="col-span-12 flex justify-end">
                  <a
                    @click="showModalDelete = false"
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
                      focus:outline-none
                      focus:bg-red-400
                      focus:shadow-outline-gray
                      transition
                      ease-in-out
                      duration-150
                    "
                    >Cancelar</a
                  >
                  <button
                    form="formDelete"
                    type="submit"
                    class="
                      ml-3
                      inline-flex
                      items-center
                      px-4
                      py-2
                      bg-blue-900
                      border border-transparent
                      rounded-md
                      font-semibold
                      text-xs text-white
                      uppercase
                      tracking-widest
                      hover:bg-blue-400
                      active:bg-blue-600
                      focus:outline-none
                      focus:bg-blue-400
                      focus:shadow-outline-gray
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
  
  export default defineComponent({
    components: {
      AppLayout,
      Head,
      Link,
      ListItem,
      DialogModal,
      JetValidationErrors,
    },
  
    props: {
      atendimento: Object,
      equipes: Array,
    },
    data() {
      return {
        form: this.$inertia.form({
          ...this.atendimento,
        }),
  
        showModal: false,
        formDelete: this.$inertia.form({
          ...this.atendimento,
        }),
  
        showModalDelete: false,
      };
    },
    methods: {
      submit() {
        this.form.put(this.route("atendimentos.update", this.atendimento.id));
        this.showModal = false;
      },
      submitDelete() {
        this.formDelete.delete(
          this.route("atendimentos.destroy", this.atendimento.id)
        );
        this.showModalDelete = false;
      },
    },
  });
  </script>
  