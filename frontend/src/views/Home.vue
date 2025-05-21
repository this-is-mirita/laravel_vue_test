<template>
  <div class="home-page">
    <h1 class="main-title">Добро пожаловать на главную страницу!</h1>

    <div class="articles-block">
      <h2>Список статей (пока пусто)</h2>
    </div>

    <div class="cards-wrapper">
      <div class="info-card">
        <h3>Быстро</h3>
        <p>Наш сервис работает молниеносно — никакого ожидания!</p>
      </div>
      <div class="info-card">
        <h3>Просто</h3>
        <p>Удобный и понятный интерфейс для каждого пользователя.</p>
      </div>
      <div class="info-card">
        <h3>Надёжно</h3>
        <p>Ваши данные под надёжной защитой.</p>
      </div>
    </div>
  </div>
</template>

<script>
import HeaderComponent from "@/components/HeaderComponent.vue";

export default {
  name: 'Home',
  components: {
    HeaderComponent,
  }
}
</script>

<style scoped lang="scss">
.home-page {
  padding: 40px 20px;
  background: #f5f7fa;
  min-height: 100vh;
  text-align: center;
}

.main-title {
  font-size: 32px;
  margin-bottom: 30px;
  color: #2c3e50;
}

.articles-block {
  background: #fff;
  padding: 25px;
  margin: 0 auto 40px;
  border-radius: 10px;
  box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
  max-width: 700px;

  h2 {
    margin: 0;
    color: #34495e;
  }
}

.cards-wrapper {
  display: flex;
  justify-content: center;
  gap: 20px;
  flex-wrap: wrap;
}

.info-card {
  background: #fff;
  padding: 20px;
  width: 250px;
  border-radius: 12px;
  box-shadow: 0 8px 20px rgba(0, 0, 0, 0.08);
  transition: transform 0.3s ease;
  text-align: left;

  h3 {
    color: #42b983;
    margin-bottom: 10px;
  }

  p {
    color: #555;
    font-size: 15px;
  }

  &:hover {
    transform: translateY(-5px);
  }
}
</style>
