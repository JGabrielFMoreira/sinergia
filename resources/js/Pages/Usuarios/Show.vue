<template>
    <app-layout title="Dashboard">
      <template #header>
        <div class="flex justify-end">
          <Link
            :href="route('usuarios.index')"
            class="
              inline-flex
              items-center
              px-4
              py-1
              bg-blue-800
              border border-transparent
              rounded-md
              font-semibold
              text-xs text-white
              uppercase
              tracking-widest
              hover:bg-blue-600
              active:bg-blue-900
              focus:outline-none focus:border-gray-900 focus:shadow-outline-gray
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
                bg-gray-800
                border border-transparent
                rounded-md
                font-semibold
                text-xs text-white
                uppercase
                tracking-widest
              "
            >
              EDIÇÃO DE USUÁRIO</list-item
            >
            <form id="form" @submit.prevent="submit">
              <div class="grid grid-cols-12 gap-2">
                <div class="col-span-4">
                  <label
                    for="name"
                    class="
                      block
                      text-xs text-black
                      uppercase
                      font-bold
                      tracking-widest
                    "
                    >NOME</label
                  >
                  <input
                    required
                    v-model="form.name"
                    style="width: 100%"
                    type="text"
                    name="name"
                    id="name"
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
                <div class="col-span-4">
                  <label
                    for="matricula"
                    class="
                      block
                      text-xs text-black
                      uppercase
                      font-bold
                      tracking-widest
                    "
                    >USUÁRIO</label
                  >
                  <input
                    required
                    v-model="form.matricula"
                    style="width: 100%"
                    type="text"
                    name="matricula"
                    id="matricula"
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
                <div class="col-span-4">
                  <label
                    for="senha"
                    class="
                      block
                      text-xs text-black
                      uppercase
                      font-bold
                      tracking-widest
                    "
                    >SENHA</label
                  >
                  <input
                  required
                    v-model="form.password"
                    style="width: 100%"
                    type="password"
                    name="password"
                    id="password"
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
                <div class="col-span-4">
                  <label
                    for="categoria_id"
                    class="
                      block
                      text-xs text-black
                      uppercase
                      font-bold
                      tracking-widest
                    "
                    >TIPO</label
                  >
                  <select
                    required
                    v-model="form.categoria_id"
                    style="width: 100%"
                    name="categoria_id"
                    id="categoria_id"
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
                    <option v-for="tipo in tipos" :key="tipo.id" :value="tipo.id">
                      {{ tipo.descricao }}
                    </option>
                  </select>
                </div>
                <div class="col-span-4">
                  <label
                    for="empresa"
                    class="
                      block
                      text-xs text-black
                      uppercase
                      font-bold
                      tracking-widest
                    "
                    >EMPRESA</label
                  >
                  <select
                    required
                    v-model="form.empresa_id"
                    style="width: 100%"
                    name="empresa"
                    id="empresa"
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
                  <option v-for="empresa in empresas" :key="empresa.id" :value="empresa.id">
                      {{ empresa.descricao }}
                    </option>
                  </select>
                </div>
                <div class="col-span-4">
                  <label
                    for="status"
                    class="
                      block
                      text-xs text-black
                      uppercase
                      font-bold
                      tracking-widest
                    "
                    >STATUS</label
                  >
                  <select
                    required
                    v-model="form.status"
                    style="width: 100%"
                    name="status"
                    id="status"
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
                    <option value="ATIVO">ATIVO</option>
                    <option value="INATIVO">INATIVO</option>
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
            <thead class="bg-gray-900">
              <tr class="text-white text-center">
                <th class="font-semibold text-xs uppercase">NOME</th>
                <th class="font-semibold text-xs uppercase">USUÁRIO</th>
                <th class="font-semibold text-xs uppercase">TIPO</th>
                <th class="font-semibold text-xs uppercase">EMPRESA</th>
                <th class="font-semibold text-xs uppercase">STATUS</th>
                <th class="font-semibold text-xs uppercase px-2 py-2">AÇÕES</th>
              </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
              <tr class="text-center">
                <td class="text-xs px-2 py-2 text-center">
                  <span> {{ usuario.name }} </span>
                </td>
                <td class="text-xs px-2 py-2 text-center">
                  <span> {{ usuario.matricula }} </span>
                </td>
                <td class="text-xs px-2 py-2 text-center">
                  <span> {{ usuario.categoria.descricao }} </span>
                </td>
                <td class="text-xs px-2 py-2 text-center">
                  <span> {{ usuario.empresa.descricao }} </span>
                </td>
                <td class="text-xs px-2 py-2 text-center">
                  <span
                    :class="{
                      'bg-green-600 text-white p-1 rounded':
                        usuario.status === 'ATIVO',
                      'bg-red-600 text-white p-1 rounded':
                        usuario.status === 'INATIVO',
                    }"
                  >
                    {{ usuario.status }}
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
                      >Tem certeza que deseja excluir o usuário:</span
                    >
                    <span
                      class="
                        ml-2
                        font-bold
                        text-xs text-black
                        uppercase
                        tracking-widest
                      "
                      >{{ usuario.name }}</span
                    >
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
                      bg-green-700
                      border border-transparent
                      rounded-md
                      font-semibold
                      text-xs text-white
                      uppercase
                      tracking-widest
                      hover:bg-green-400
                      active:bg-green-600
                      focus:outline-none
                      focus:bg-green-400
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
      usuario: Object,
      tipos: Array,
      empresas:Array
    },
    data() {
      return {
        form: this.$inertia.form({
          ...this.usuario,
        }),
  
        showModal: false,
        formDelete: this.$inertia.form({
          ...this.usuario,
        }),
  
        showModalDelete: false,
      };
    },
    methods: {
      submit() {
        this.form.put(this.route("usuarios.update", this.usuario.id));
        this.showModal = false;
      },
      submitDelete() {
        this.formDelete.delete(this.route("usuarios.destroy", this.usuario.id));
        this.showModalDelete = false;
      },
    },
  });
  </script>
  