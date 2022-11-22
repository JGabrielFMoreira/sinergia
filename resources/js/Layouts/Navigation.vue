<template>
  <div>
    <jet-nav-link
      :href="route('dashboard')"
      :active="route().current('dashboard')"
      >Dashboard</jet-nav-link
    >
    <nav-link-dropdown
      label="Baixa de OS"
      :active="
        route().current('atendimento.*') || route().current('servicos.*')
      "
    >
      <jet-dropdown-link :href="route('atendimento.index')"
        >AtendimentosSSS</jet-dropdown-link
      >
      <jet-dropdown-link :href="route('servicos.index')"
        >Parecer técnico</jet-dropdown-link
      >
    </nav-link-dropdown>

    <nav-link-dropdown
      label="Medidores"
      :active="
        route().current('medidores.*') ||
        route().current('saldo_medidores.*') ||
        route().current('medidores.*') ||
        route().current('medidores*')
      "
    >
      <jet-dropdown-link :href="route('medidores.index')"
        >Recebido</jet-dropdown-link
      >
      <jet-dropdown-link :href="route('saldo_medidores.index')"
        >Saldo</jet-dropdown-link
      >
      <jet-dropdown-link :href="route('medidores.index')"
        >Aplicado</jet-dropdown-link
      >
    </nav-link-dropdown>

     <nav-link-dropdown
      label="Materiais"
      :active="
        route().current('materiais.*') ||
        route().current('smedidores.*') ||
        route().current('medidores.*') ||
        route().current('medidores*')
      "
    >
      <jet-dropdown-link :href="route('medidores.index')"
        >Recebido</jet-dropdown-link
      >
      <jet-dropdown-link :href="route('saldo_medidores.index')"
        >Saldo</jet-dropdown-link
      >
      <jet-dropdown-link :href="route('medidores.index')"
        >Aplicado</jet-dropdown-link
      >
    </nav-link-dropdown>

    <nav-link-dropdown
      label="Estrutura"
      :active="
        route().current('estrutura.*') ||
        route().current('estrutura_fiscal.*') ||
        route().current('estrutura_supervisor.*')
      "
    >
      <jet-dropdown-link :href="route('estrutura.index')"
        >Equipes</jet-dropdown-link
      >
      <jet-dropdown-link :href="route('estrutura_fiscal.index')"
        >Fiscais</jet-dropdown-link
      >
      <jet-dropdown-link :href="route('estrutura_supervisor.index')"
        >Supervisores</jet-dropdown-link
      >
    </nav-link-dropdown>

    <nav-link-dropdown
      label="Administrador"
      :active="
        route().current('usuarios.*') ||
        route().current('usuarios.*') ||
        route().current('usuarios.*')
      "
    >
      <jet-dropdown-link :href="route('usuarios.index')"
        >Usuários</jet-dropdown-link
      >
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
