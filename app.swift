import SwiftUI

struct ContentView: View {
    
    @State private var level = 1
    @State private var wrongAnswer = false
    @State private var selectedAnswers: [Int] = []
    
    let answerTexts = [
        "The Big Ben",
        "The Eiffel Tower",
        "The London Eye",
        "The Colosseum",
        "The Great Wall of China",
        "The Tower of London"
    ]
    
    var body: some View {
        VStack {
            Image(systemName: "globe")
                .imageScale(.large)
                .foregroundColor(.accentColor)
            
            switch level {
            case 1:
                question1
            case 2:
                question2
            case 3:
                question3
            case 4:
                question4
            case 5:
                question5
            case 100:
                endScreen
            default:
                EmptyView()
            }
            
            if wrongAnswer {
                Text("Wrong Answer!").foregroundColor(.red)
            }
        }
    }
    
    private var question1: some View {
        VStack {
            Text("In which continent is England located?")
            Button("Europe") {
                level = 2
                wrongAnswer = false
            }
            Button("Africa") {
                wrongAnswer = true
            }
            Button("Asia") {
                wrongAnswer = true
            }
        }
    }
    
    private var question2: some View {
        VStack {
            Text("How many people live in England?")
            Button("Over 58 million") {
                wrongAnswer = true
            }
            Button("Under 55 million") {
                wrongAnswer = true
            }
            Button("Over 55 million") {
                level = 3
                wrongAnswer = false
            }
        }
    }
    
    private var question3: some View {
        VStack {
            Text("What is the capital of England?")
            Button("Paris") {
                wrongAnswer = true
            }
            Button("London") {
                level = 4
                wrongAnswer = false
            }
            Button("Wales") {
                wrongAnswer = true
            }
        }
    }
    
    private var question4: some View {
        VStack {
            Text("Tick the correct answers:")
            Text("What can you see in London?")
            
            ForEach(0..<answerTexts.count, id: \.self) { index in
                Button("\(answerTexts[index]) \(selectedAnswers.contains(index) ? "✓" : "")") {
                    if selectedAnswers.contains(index) {
                        selectedAnswers.removeAll(where: { $0 == index })
                    } else {
                        selectedAnswers.append(index)
                    }
                }
            }
            
            Button("Submit") {
                if selectedAnswers == [0, 2, 5] {
                    level = 5
                    wrongAnswer = false
                } else {
                    wrongAnswer = true
                }
            }
        }
    }

    
    private var question5: some View {
    VStack {
        Text("Is Scotland a part of the UK")
        Button("No") {
            wrongAnswer = true
        }
        Button("Yes") {
            level = 100
            wrongAnswer = false
        }
    }
    }


    private var endScreen: some View {
        VStack {
            Text("Congratulations! You've completed the quiz.")
            
            Text("You can visit our github project with the source code of the quiz, visit:")
            
            Button(action: {
                if let url = URL(string: "https://github.com/Eltend/English_project") {
                    UIApplication.shared.open(url, options: [:], completionHandler: nil)
                }
            }, label: {
                Text("Our GitHub repository")
                    .foregroundColor(.blue)
                    .underline()
            })
            Text("https://github.com/Eltend/English_project")
        }
    }
}

struct ContentView_Previews: PreviewProvider {
    static var previews: some View {
        ContentView()
    }
}
