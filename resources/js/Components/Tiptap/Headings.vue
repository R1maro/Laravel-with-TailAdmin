<script setup lang="ts">
import { defineProps, ref } from "vue";

const { editor } = defineProps(["editor"]);

const open = ref(false);

function toggleOpen() {
    open.value = !open.value;
}
</script>

<template>
    <button
        type="button"
        class="relative pl-4 pr-7 py-1 border rounded-lg border-white text-white stroke-white"
        @click.stop="toggleOpen"
    >
        <span>{{
            editor.isActive("paragraph")
                ? "Paragraph"
                : editor.isActive("heading", { level: 1 })
                ? "Heading 1"
                : editor.isActive("heading", { level: 2 })
                ? "Heading 2"
                : editor.isActive("heading", { level: 3 })
                ? "Heading 3"
                : editor.isActive("heading", { level: 4 })
                ? "Heading 4"
                : editor.isActive("heading", { level: 5 })
                ? "Heading 5"
                : editor.isActive("heading", { level: 6 })
                ? "Heading 6"
                : "Text"
        }}</span>

        <!-- arrow -->
        <svg
            xmlns="http://www.w3.org/2000/svg"
            viewBox="0 0 24 24"
            stroke="inherit"
            stroke-width="2"
            class="size-4 absolute top-2/4 -translate-y-2/4 right-2"
        >
            <path
                fill-rule="evenodd"
                d="M12.53 16.28a.75.75 0 0 1-1.06 0l-7.5-7.5a.75.75 0 0 1 1.06-1.06L12 14.69l6.97-6.97a.75.75 0 1 1 1.06 1.06l-7.5 7.5Z"
                clip-rule="evenodd"
            />
        </svg>

        <div
            :class="[
                'py-2 border bg-[#13181f] z-10 left-2/4 -translate-x-2/4 top-10 border-graydark rounded-lg divide-y flex flex-col absolute origin-top transition-all duration-150',
                open ? 'scale-y-100' : 'scale-y-0',
            ]"
        >
            <button
                class="px-4 hover:bg-boxdark"
                @click="() => editor.chain().focus().setParagraph().run()"
            >
                Paragraph
            </button>
            <button
                type="button"
                class="px-4 hover:bg-boxdark"
                @click="
                    () =>
                        editor.chain().focus().toggleHeading({ level: 1 }).run()
                "
            >
                H1
            </button>
            <button
                type="button"
                class="px-4 hover:bg-boxdark"
                @click="
                    () =>
                        editor.chain().focus().toggleHeading({ level: 2 }).run()
                "
            >
                H2
            </button>
            <button
                type="button"
                class="px-4 hover:bg-boxdark"
                @click="
                    () =>
                        editor.chain().focus().toggleHeading({ level: 3 }).run()
                "
            >
                H3
            </button>
            <button
                type="button"
                class="px-4 hover:bg-boxdark"
                @click="
                    () =>
                        editor.chain().focus().toggleHeading({ level: 4 }).run()
                "
            >
                H4
            </button>
            <button
                type="button"
                class="px-4 hover:bg-boxdark"
                @click="
                    () =>
                        editor.chain().focus().toggleHeading({ level: 5 }).run()
                "
            >
                H5
            </button>
            <button
                type="button"
                class="px-4 hover:bg-boxdark"
                @click="
                    () =>
                        editor.chain().focus().toggleHeading({ level: 6 }).run()
                "
            >
                H6
            </button>
        </div>
    </button>
</template>
