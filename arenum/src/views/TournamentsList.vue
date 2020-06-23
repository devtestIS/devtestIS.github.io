<template>
  <div class="tournaments-list">
    <TournamentItem
      v-for="(item, index) in tournamentsList"
      :key="index"
      :tournament-data="item"
    />
    <div ref="sentinel" class="sentinel"></div>
  </div>
</template>

<script>
import { mapState, mapGetters, mapActions } from "vuex";
import TournamentItem from "@/components/TournamentItem";
export default {
  name: "TournamentsList",
  components: {
    TournamentItem
  },
  computed: {
    ...mapState(["pending"]),
    ...mapGetters(["tournamentsList"])
  },
  created() {
    this.getTourmentsList();
  },
  updated() {
    this.$nextTick(function() {
      const intersectionObserver = new IntersectionObserver(entries => {
        if (
          entries.some(entry => entry.intersectionRatio > 0) &&
          !this.pending
        ) {
          this.getTourmentsList();
        }
      });
      intersectionObserver.observe(this.$refs.sentinel);
    });
  },
  methods: {
    ...mapActions(["getTourmentsList"])
  }
};
</script>

<style lang="scss" scoped>
.sentinel {
  width: 100%;
  height: 10px;
  background: #000000;
}
</style>
