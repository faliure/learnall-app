import { ref } from 'vue';
import { usePage } from '@inertiajs/vue3';
import HomeIcon from '@/Components/Icons/Home.vue';
import LearnIcon from '@/Components/Icons/Learn.vue';
import PracticeIcon from '@/Components/Icons/Practice.vue';
import LeaderboardIcon from '@/Components/Icons/Compete.vue';
import ExploreIcon from '@/Components/Icons/Explore.vue';
import BuilderIcon from '@/Components/Icons/Builder.vue';
import LabsIcon from '@/Components/Icons/Labs.vue';
import PaletteIcon from '@/Components/Icons/Palette.vue';

const currentPage = ref(null);

const pages = [
    { label: "Home", target: "/home", component: 'Home', icon: HomeIcon, color: 'blue' },
    { label: "Learn", target: "/learn", component: 'Learn', icon: LearnIcon, color: 'emerald' },
    { label: "Practice", target: "/practice", component: 'Practice', icon: PracticeIcon, color: 'violet' },
    { label: "Compete", target: "/compete", component: 'Compete', icon: LeaderboardIcon, color: 'stone' },
    { label: "Explore", target: "/explore", component: 'Explore', icon: ExploreIcon, color: 'cyan' },
];

if (window.environment !== 'production') {
    pages.push(...[
        { label: "Builder", target: "/builder", component: 'Builder', icon: BuilderIcon, color: 'lime' },
        { label: "Labs", target: "/labs", component: 'Labs', icon: LabsIcon, color: 'orange' },
        { label: "Palette", target: "/palette", component: 'Palette', icon: PaletteIcon, color: 'pink' },
    ]);
}

export default pages;

export const getCurrentPage = () => pages.find(p => p.component === usePage().component) || pages[0];

export const setCurrentPage = (page) => {
    currentPage.value = page || getCurrentPage();
}

export const getCurrentPageRef = () => currentPage;
export const getCurrentColorRef = () => currentPage;
