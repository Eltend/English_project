import tkinter as tk
from tkinter import messagebox
import webbrowser

class QuizApp(tk.Tk):
    def __init__(self):
        super().__init__()
        self.title("Quiz")

        self.level = 1
        self.wrong_answer = False
        self.selected_answers = []

        self.questions = [
            ("In which continent is England located?", ["Europe", "Africa", "Asia"]),
            ("How many people live in England?", ["Over 58 million", "Under 55 million", "Over 55 million"]),
            ("What is the capital of England?", ["Paris", "London", "Wales"]),
            ("What can you see in London?", ["The Big Ben", "The Eiffel Tower", "The London Eye", "The Colosseum", "The Great Wall of China", "The Tower of London"])
        ]

        self.correct_answers = [
            "Europe",
            "Over 55 million",
            "London",
            ["The Big Ben", "The London Eye", "The Tower of London"]
        ]

        self.show_question()

    def show_question(self):
        for widget in self.winfo_children():
            widget.destroy()

        if self.level <= 3:
            question, answers = self.questions[self.level - 1]
            tk.Label(self, text=question).pack(pady=10)

            for answer in answers:
                tk.Button(self, text=answer, command=lambda ans=answer: self.check_answer(ans)).pack(pady=5)
        elif self.level == 4:
            question, answers = self.questions[self.level - 1]
            tk.Label(self, text="Tick the correct answers:").pack(pady=10)
            tk.Label(self, text=question).pack(pady=10)

            for answer in answers:
                btn = tk.Checkbutton(self, text=answer, command=lambda ans=answer: self.toggle_answer(ans))
                btn.pack(pady=5)
                btn.var = tk.BooleanVar()
                btn.config(variable=btn.var)

            tk.Button(self, text="Submit", command=self.check_multiple_answers).pack(pady=10)
        else:
            self.show_end_screen()

    def check_answer(self, answer):
        if answer == self.correct_answers[self.level - 1]:
            self.level += 1
            self.show_question()
        else:
            messagebox.showerror("Wrong Answer", "That's not the correct answer. Try again!")

    def toggle_answer(self, answer):
        if answer in self.selected_answers:
            self.selected_answers.remove(answer)
        else:
            self.selected_answers.append(answer)

    def check_multiple_answers(self):
        if sorted(self.selected_answers) == sorted(self.correct_answers[self.level - 1]):
            self.level += 1
            self.show_question()
        else:
            messagebox.showerror("Wrong Answer", "That's not the correct answer. Try again!")

    def show_end_screen(self):
        tk.Label(self, text="Congratulations! You've completed the quiz.").pack(pady=10)
        tk.Label(self, text="You can visit our github project with the source code of the quiz, visit:").pack(pady=10)

        def open_github():
            webbrowser.open("https://github.com/Eltend/English_project")

        tk.Button(self, text="Our GitHub repository", command=open_github).pack(pady=5)
        tk.Label(self, text="https://github.com/Eltend/English_project").pack(pady=10)

app = QuizApp()
app.mainloop()