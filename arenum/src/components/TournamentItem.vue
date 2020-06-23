<template>
  <section class="tournament">
    <img
      :src="image ? `${image}?width=300&height=300` : placeholder"
      alt="image"
      class="tournament__image"
    />
    <div class="tournament__data">
      <span class="tournament__date">{{ date }}</span>
      <h1 class="tournament__heading">
        <i class="payment" :class="free"></i>
        {{ tournamentData.name }}
      </h1>
      <p class="tournament__description">
        {{ tournamentData.tournamentType.gameMode }} •
        {{ tournamentData.participateCount }}/{{ tournamentData.maxUsers }} •
        Призовой фонд {{ prize }} руб.
      </p>
    </div>
  </section>
</template>

<script>
import moment from "moment";
export default {
  name: "TournamentItem",
  props: {
    tournamentData: {
      type: Object,
      required: true,
      default() {
        return {};
      }
    }
  },
  data() {
    return {
      placeholder: require("@/assets/images/cover.png"),
      image: this.tournamentData.cardImage
    };
  },
  computed: {
    prize() {
      const val = this.tournamentData.prizeTable;
      return val.length
        ? val.reduce((prevVal, currVal) => prevVal + currVal)
        : 0;
    },
    date() {
      return moment(this.tournamentData.startedAt)
        .locale("ru")
        .format("DD MMMM, в h:mm");
    },
    free() {
      return this.tournamentData.paymentType === "free" ? "payment_free" : "";
    }
  }
};
</script>

<style lang="scss" scoped>
.tournament {
  display: flex;
  flex-wrap: nowrap;
  flex-direction: row;
  padding: 20px 18px;
  background: #000000;
  mix-blend-mode: lighten;

  &__image {
    display: block;
    width: 60px;
    height: 60px;
    border: 1px solid rgba(242, 242, 242, 0.1);
    box-sizing: border-box;
    box-shadow: 0px 4px 24px rgba(0, 0, 0, 0.2);
    border-radius: 8px;
  }

  &__data {
    display: flex;
    flex-wrap: nowrap;
    flex-direction: column;
    flex-grow: 1;
    margin-left: 16px;
    box-shadow: 0px 0.5px 0px #2e3038;
  }

  &__date,
  &__heading,
  &__description {
    text-align: left;
  }

  &__date,
  &__heading {
    font-family: GraphikLCG-Semibold;
    color: #f2f2f2;
    font-weight: 500;
  }

  &__heading,
  &__description {
    margin: 0;
    letter-spacing: -0.2px;
  }

  &__date {
    font-size: 11px;
    line-height: 14px;
    letter-spacing: 0.2px;
    text-transform: uppercase;
  }

  &__heading {
    display: flex;
    align-items: center;
    font-size: 17px;
    line-height: 24px;
  }

  &__description {
    font-size: 15px;
    line-height: 20px;
    color: #5c5e66;
  }
}
.payment {
  display: inline-block;
  width: 20px;
  height: 12px;
  margin-right: 6px;
  background-size: cover;
  background-image: url("../assets/images/ticket.png");

  &_free {
    background-image: url("../assets/images/free.png");
  }
}
</style>
