<script setup lang="ts">
import { defineProps } from "vue";
import { useEditor, EditorContent } from "@tiptap/vue-3";
import StarterKit from "@tiptap/starter-kit";
import Headings from "./Headings.vue";
import Image from "@tiptap/extension-image";

const props = defineProps<{
    modelValue: string;
    editable: boolean;
}>();

const emit = defineEmits(["update:modelValue"]);

const editor = useEditor({
    editorProps: {
        attributes: {
            class: "max-w-full gap-0 prose prose-a:underline prose-img:my-8 dark:prose-invert mx-auto border border-darkgray rounded-b-xl py-8 px-4",
        },
    },
    content: props.modelValue,
    onUpdate: ({ editor }) => {
        emit("update:modelValue", editor.getHTML());
    },
    extensions: [StarterKit, Image],
    editable: props.editable,
});
</script>

<template>
    <div
        :class="
            props.editable === true
                ? 'saturate-100 brightness-100'
                : 'saturate-50 brightness-50'
        "
    >
        <section
            v-if="editor"
            class="border border-b-0 rounded-t-xl px-3 py-2 bg-slate-600 dark:bg-[#1A222C] flex gap-2 flex-wrap stroke-white fill-white"
        >
            <Headings :editor="editor" />

            <!-- Bold -->
            <button
                type="button"
                @click="editor.chain().focus().toggleBold().run()"
                :disabled="!editor.can().chain().focus().toggleBold().run()"
                :class="[
                    'border-b-2 px-2 text-white',
                    editor.isActive('bold')
                        ? 'bg-black border-b-2 px-2 text-white'
                        : 'border-[#9a9a9a] bg-transparent',
                ]"
            >
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke-width="1.5"
                    stroke="inherit"
                    class="size-5"
                >
                    <path
                        stroke-linejoin="round"
                        d="M6.75 3.744h-.753v8.25h7.125a4.125 4.125 0 0 0 0-8.25H6.75Zm0 0v.38m0 16.122h6.747a4.5 4.5 0 0 0 0-9.001h-7.5v9h.753Zm0 0v-.37m0-15.751h6a3.75 3.75 0 1 1 0 7.5h-6m0-7.5v7.5m0 0v8.25m0-8.25h6.375a4.125 4.125 0 0 1 0 8.25H6.75m.747-15.38h4.875a3.375 3.375 0 0 1 0 6.75H7.497v-6.75Zm0 7.5h5.25a3.75 3.75 0 0 1 0 7.5h-5.25v-7.5Z"
                    />
                </svg>
            </button>

            <!-- Italic -->
            <button
                type="button"
                @click="editor.chain().focus().toggleItalic().run()"
                :disabled="!editor.can().chain().focus().toggleItalic().run()"
                :class="[
                    'border-b-2 px-2 text-white',
                    editor.isActive('italic')
                        ? 'bg-black border-b-2 px-2 text-white'
                        : 'border-[#9a9a9a] bg-transparent',
                ]"
            >
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 24 24"
                    fill="inherit"
                    class="size-5"
                >
                    <path
                        fill-rule="evenodd"
                        d="M10.497 3.744a.75.75 0 0 1 .75-.75h7.5a.75.75 0 0 1 0 1.5h-3.275l-5.357 15.002h2.632a.75.75 0 1 1 0 1.5h-7.5a.75.75 0 1 1 0-1.5h3.275l5.357-15.002h-2.632a.75.75 0 0 1-.75-.75Z"
                        clip-rule="evenodd"
                    />
                </svg>
            </button>

            <!-- Strike -->
            <button
                type="button"
                @click="editor.chain().focus().toggleStrike().run()"
                :disabled="!editor.can().chain().focus().toggleStrike().run()"
                :class="[
                    'border-b-2 px-2 text-white',
                    editor.isActive('strike')
                        ? 'bg-black border-b-2 px-2 text-white'
                        : 'border-[#9a9a9a] bg-transparent',
                ]"
            >
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 24 24"
                    fill="inherit"
                    class="size-5"
                >
                    <path
                        fill-rule="evenodd"
                        d="M9.657 4.728c-1.086.385-1.766 1.057-1.979 1.85-.214.8.046 1.733.81 2.616.746.862 1.93 1.612 3.388 2.003.07.019.14.037.21.053h8.163a.75.75 0 0 1 0 1.5h-8.24a.66.66 0 0 1-.02 0H3.75a.75.75 0 0 1 0-1.5h4.78a7.108 7.108 0 0 1-1.175-1.074C6.372 9.042 5.849 7.61 6.229 6.19c.377-1.408 1.528-2.38 2.927-2.876 1.402-.497 3.127-.55 4.855-.086A8.937 8.937 0 0 1 16.94 4.6a.75.75 0 0 1-.881 1.215 7.437 7.437 0 0 0-2.436-1.14c-1.473-.394-2.885-.331-3.966.052Zm6.533 9.632a.75.75 0 0 1 1.03.25c.592.974.846 2.094.55 3.2-.378 1.408-1.529 2.38-2.927 2.876-1.402.497-3.127.55-4.855.087-1.712-.46-3.168-1.354-4.134-2.47a.75.75 0 0 1 1.134-.982c.746.862 1.93 1.612 3.388 2.003 1.473.394 2.884.331 3.966-.052 1.085-.384 1.766-1.056 1.978-1.85.169-.628.046-1.33-.381-2.032a.75.75 0 0 1 .25-1.03Z"
                        clip-rule="evenodd"
                    />
                </svg>
            </button>

            <!-- Codeblock -->
            <button
                type="button"
                @click="editor.chain().focus().toggleCodeBlock().run()"
                :disabled="
                    !editor.can().chain().focus().toggleCodeBlock().run()
                "
                :class="[
                    'border-b-2 px-2 text-white',
                    editor.isActive('code')
                        ? 'bg-black border-b-2 px-2 text-white'
                        : 'border-[#9a9a9a] bg-transparent',
                ]"
            >
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 24 24"
                    fill="inherit"
                    class="size-5"
                >
                    <path
                        fill-rule="evenodd"
                        d="M14.447 3.026a.75.75 0 0 1 .527.921l-4.5 16.5a.75.75 0 0 1-1.448-.394l4.5-16.5a.75.75 0 0 1 .921-.527ZM16.72 6.22a.75.75 0 0 1 1.06 0l5.25 5.25a.75.75 0 0 1 0 1.06l-5.25 5.25a.75.75 0 1 1-1.06-1.06L21.44 12l-4.72-4.72a.75.75 0 0 1 0-1.06Zm-9.44 0a.75.75 0 0 1 0 1.06L2.56 12l4.72 4.72a.75.75 0 0 1-1.06 1.06L.97 12.53a.75.75 0 0 1 0-1.06l5.25-5.25a.75.75 0 0 1 1.06 0Z"
                        clip-rule="evenodd"
                    />
                </svg>
            </button>

            <!-- Blockquote -->
            <button
                type="button"
                @click="editor.chain().focus().toggleBlockquote().run()"
                :disabled="
                    !editor.can().chain().focus().toggleBlockquote().run()
                "
                :class="[
                    'border-b-2 px-2 text-white',
                    editor.isActive('blockquote')
                        ? 'bg-black border-b-2 px-2 text-white'
                        : 'border-[#9a9a9a] bg-transparent',
                ]"
            >
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 24 24"
                    fill="inherit"
                    class="size-5"
                >
                    <title>format-quote-close</title>
                    <path
                        d="M14,17H17L19,13V7H13V13H16M6,17H9L11,13V7H5V13H8L6,17Z"
                    />
                </svg>
            </button>

            <!-- Hardbreak -->
            <button
                type="button"
                @click="editor.chain().focus().setHardBreak().run()"
                :disabled="!editor.can().chain().focus().setHardBreak().run()"
                :class="[
                    'border-b-2 px-2 text-white',
                    editor.isActive('hardbreak')
                        ? 'bg-black border-b-2 px-2 text-white'
                        : 'border-[#9a9a9a] bg-transparent',
                ]"
            >
                Hardbreak
            </button>

            <!-- Bulletlist -->
            <button
                type="button"
                @click="editor.chain().focus().toggleBulletList().run()"
                :disabled="
                    !editor.can().chain().focus().toggleBulletList().run()
                "
                :class="[
                    'border-b-2 px-2 text-white',
                    editor.isActive('bulletList')
                        ? 'bg-black border-b-2 px-2 text-white'
                        : 'border-[#9a9a9a] bg-transparent',
                ]"
            >
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 24 24"
                    fill="inherit"
                    class="size-5"
                >
                    <path
                        fill-rule="evenodd"
                        d="M2.625 6.75a1.125 1.125 0 1 1 2.25 0 1.125 1.125 0 0 1-2.25 0Zm4.875 0A.75.75 0 0 1 8.25 6h12a.75.75 0 0 1 0 1.5h-12a.75.75 0 0 1-.75-.75ZM2.625 12a1.125 1.125 0 1 1 2.25 0 1.125 1.125 0 0 1-2.25 0ZM7.5 12a.75.75 0 0 1 .75-.75h12a.75.75 0 0 1 0 1.5h-12A.75.75 0 0 1 7.5 12Zm-4.875 5.25a1.125 1.125 0 1 1 2.25 0 1.125 1.125 0 0 1-2.25 0Zm4.875 0a.75.75 0 0 1 .75-.75h12a.75.75 0 0 1 0 1.5h-12a.75.75 0 0 1-.75-.75Z"
                        clip-rule="evenodd"
                    />
                </svg>
            </button>

            <!-- Orderedlist -->
            <button
                type="button"
                @click="editor.chain().focus().toggleOrderedList().run()"
                :disabled="
                    !editor.can().chain().focus().toggleOrderedList().run()
                "
                :class="[
                    'border-b-2 px-2 text-white',
                    editor.isActive('orderedList')
                        ? 'bg-black border-b-2 px-2 text-white'
                        : 'border-[#9a9a9a] bg-transparent',
                ]"
            >
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 24 24"
                    fill="inherit"
                    class="size-5"
                >
                    <path
                        fill-rule="evenodd"
                        d="M7.491 5.992a.75.75 0 0 1 .75-.75h12a.75.75 0 1 1 0 1.5h-12a.75.75 0 0 1-.75-.75ZM7.49 11.995a.75.75 0 0 1 .75-.75h12a.75.75 0 0 1 0 1.5h-12a.75.75 0 0 1-.75-.75ZM7.491 17.994a.75.75 0 0 1 .75-.75h12a.75.75 0 1 1 0 1.5h-12a.75.75 0 0 1-.75-.75ZM2.24 3.745a.75.75 0 0 1 .75-.75h1.125a.75.75 0 0 1 .75.75v3h.375a.75.75 0 0 1 0 1.5H2.99a.75.75 0 0 1 0-1.5h.375v-2.25H2.99a.75.75 0 0 1-.75-.75ZM2.79 10.602a.75.75 0 0 1 0-1.06 1.875 1.875 0 1 1 2.652 2.651l-.55.55h.35a.75.75 0 0 1 0 1.5h-2.16a.75.75 0 0 1-.53-1.281l1.83-1.83a.375.375 0 0 0-.53-.53.75.75 0 0 1-1.062 0ZM2.24 15.745a.75.75 0 0 1 .75-.75h1.125a1.875 1.875 0 0 1 1.501 2.999 1.875 1.875 0 0 1-1.501 3H2.99a.75.75 0 0 1 0-1.501h1.125a.375.375 0 0 0 .036-.748H3.74a.75.75 0 0 1-.75-.75v-.002a.75.75 0 0 1 .75-.75h.411a.375.375 0 0 0-.036-.748H2.99a.75.75 0 0 1-.75-.75Z"
                        clip-rule="evenodd"
                    />
                </svg>
            </button>

            <!-- HorizontalRule -->
            <button
                type="button"
                @click="editor.chain().focus().setHorizontalRule().run()"
                :disabled="
                    !editor.can().chain().focus().setHorizontalRule().run()
                "
                :class="[
                    'border-b-2 px-2 text-white',
                    editor.isActive('strike')
                        ? 'bg-black border-b-2 px-2 text-white'
                        : 'border-[#9a9a9a] bg-transparent',
                ]"
            >
                HorizontalRule
            </button>
        </section>
        <editor-content :editor="editor" />
    </div>
</template>
