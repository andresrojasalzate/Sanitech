<template>
    <table>
        <thead>
            <tr>
                <th>DL</th>
                <th>DT</th>
                <th>DC</th>
                <th>DJ</th>
                <th>DV</th>
                <th>DS</th>
                <th>DM</th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="week in weeks" :key="week.id">
                <td v-for="day in week.days" :key="day ? day.date : ''">
                    {{ day ? day.date : '' }}
                </td>
            </tr>
        </tbody>
    </table>
</template>

<script>
export default {
    data() {
        return {
            weeks: this.generateWeeksForMonth(new Date()),
        };
    },
    methods: {
        generateWeeksForMonth(date) {
            const year = date.getFullYear();
            const month = date.getMonth();
            const firstDayOfMonth = new Date(year, month, 1);
            const lastDayOfMonth = new Date(year, month + 1, 0);
            const weeks = [];

            for (let day = firstDayOfMonth; day <= lastDayOfMonth; day.setDate(day.getDate() + 1)) {
                const dayOfWeek = day.getDay();
                const week = Math.floor((day.getDate() + firstDayOfMonth.getDay() - 1) / 7);

                if (!weeks[week]) {
                    weeks[week] = { id: week, days: Array(7).fill(null) };
                }

                // Ajusta el índice del día de la semana para que el lunes sea 0 y el domingo sea 6
                const adjustedDayOfWeek = (dayOfWeek + 6) % 7;

                weeks[week].days[adjustedDayOfWeek] = { date: day.getDate() };
            }
            return weeks;
        },
    },
};
</script>