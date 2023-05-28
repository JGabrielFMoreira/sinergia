<template>
  <div>
    <jet-nav-link :href="route('dashboard')" :active="route().current('dashboard')">Dashboard</jet-nav-link>



    <jet-nav-link :href="route('atendimentos.index')" :active="route().current('atendimentos*')">Atendimento</jet-nav-link>



    <nav-link-dropdown label="Produtividade"
      :active="
      route().current('produtividade_servico*') || route().current('produtividade_batecaixa*') || route().current('produtividade_servico*')">
      <jet-dropdown-link :href="route('produtividade_servico.index')">Lançar Serviços</jet-dropdown-link>
      <jet-dropdown-link :href="route('produtividade_batecaixa.index')">Bate Caixa</jet-dropdown-link>
    </nav-link-dropdown>



    <nav-link-dropdown label="Função Medição"
      :active="
      route().current('medicao_recebido*') || route().current('medicao_aplicado*') || route().current('medicao_saldo*')">
      <jet-dropdown-link :href="route('medicao_recebido.index')">Recebido</jet-dropdown-link>
      <jet-dropdown-link :href="route('equipes.index')">Aplicado</jet-dropdown-link>
      <jet-dropdown-link :href="route('medicao_saldo.index')">Saldo</jet-dropdown-link>
    </nav-link-dropdown>

    <nav-link-dropdown label="Materiais"
      :active="
      route().current('material_recebido*') || route().current('material_aplicado*') || route().current('material_saldo*')">
      <jet-dropdown-link :href="route('medicao_recebido.index')">Recebido</jet-dropdown-link>

    </nav-link-dropdown>


    <nav-link-dropdown label="Administrador"
      :active="
      route().current('usuarios*') || route().current('supervisores*') || route().current('fiscais*') || route().current('equipes*')">
      <jet-dropdown-link :href="route('usuarios.index')">Usuários</jet-dropdown-link>
      <jet-dropdown-link :href="route('equipes.index')">Equipes</jet-dropdown-link>
      <jet-dropdown-link :href="route('fiscais.index')">Fiscais</jet-dropdown-link>
      <jet-dropdown-link :href="route('supervisores.index')">Supervisores</jet-dropdown-link>
    </nav-link-dropdown>




  </div>
</template>

<script>
import { defineComponent } from "Vue";
import JetDropdown from "@/Jetstream/Dropdown";
import JetDropdownLink from "@/Jetstream/DropdownLink";
import JetNavLink from "@/Jetstream/NavLink";
import JetResponsiveNavLink from "@/Jetstream/ResponsiveNavLink.vue";
import NavLinkDropdown from "@/Components/NavLinkDropdown.vue";

export default defineComponent({
  components: {
    JetDropdown,
    JetDropdownLink,
    JetNavLink,
    JetResponsiveNavLink,
    NavLinkDropdown,
  },
});
</script>
