import SwiftUI
import AudioUnit
import AudioToolbox

struct ContentView: View {
    
    @State private var level = 1
    @State private var skip = 0
    @State private var wrong = 0
    @State private var wrongAnswer = false
    @State private var selectedAnswers: [Int] = []
    @State private var note_nummer = 0
    @State private var calculated = false
    @State private var level_nummer = 10
    @State private var note_temp = 100
    @State private var temp = 0
    @State private var note = 0
    
    
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
            case 6:
                question6
            case 7:
                question7
            case 8:
                question8
            case 9:
                question9
            case 10:
                question10
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
            Text("Is the QUEEN still alive?")
            Button("Yes") {
                 wrong += 1
                wrongAnswer = true
            }
            Button("No") {
                level = 2
                wrongAnswer = false
            }
            Button("SKIP") {
                wrongAnswer = false
                skip += 1
                level = 2
            }
        }
    }
    
    private var question2: some View {
        VStack {
            Text("How many Grand children?")
            Button("8") {
                wrongAnswer = false
                level = 3
            }
            Button("3") {
                wrongAnswer = true
                wrong += 1
            }
            Button("10") {
                wrongAnswer = true
                wrong += 1
            }
            Button("SKIP") {
                
                wrongAnswer = false
                skip += 1
                level = 3
                
            }
        }
    }
    
    private var question3: some View {
        VStack {
            Text("What is the capital of England?")
            Button("Paris") {
                wrongAnswer = true
                wrong += 1
            }
            Button("London") {
                level = 4
                wrongAnswer = false
            }
            Button("Wales") {
                wrongAnswer = true
                wrong += 1
            }
            Button("SKIP") {
                
                wrongAnswer = false
                skip += 1
                level = 4
                
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
                    wrong += 1
                }
            }
            Text("")
            Text("")
            Text("")
            Button("SKIP") {
                
                wrongAnswer = false
                skip += 1
                level = 5
                
            }
        }
    }
    
    
    private var question5: some View {
        VStack {
            Text("Is Scotland a part of the UK")
            Button("No") {
                wrongAnswer = true
                wrong += 1
            }
            Button("Yes") {
                level = 6
                wrongAnswer = false
            }
            Button("SKIP") {
                
                wrongAnswer = false
                skip += 1
                level = 6
                
            }
        }
    }
    private var question6: some View {
        VStack {
            Text("Was this quiz good?")
            Button("No") {
                wrong += 1
                wrongAnswer = true
            }
            Button("Yes") {
                level = 7
                wrongAnswer = false
            }
            Button("SKIP") {
                wrongAnswer = false
                skip += 1
                level = 7
            }
        }
    }
    private var question7: some View {
        VStack {
            Text("Debug test (Yes) ")
            Button("No") {
                wrong += 1
                wrongAnswer = true
            }
            Button("Yes") {
                level = 8
                wrongAnswer = false
            }
            Button("SKIP") {
                wrongAnswer = false
                skip += 1
                level = 8
            }
        }
    }
    private var question8: some View {
        VStack {
            Text("Debug test (Yes) ")
            Button("No") {
                wrong += 1
                wrongAnswer = true
            }
            Button("Yes") {
                level = 9
                wrongAnswer = false
            }
            Button("SKIP") {
                wrongAnswer = false
                skip += 1
                level = 9
            }
        }
    }
    private var question9: some View {
        VStack {
            Text("Debug test (Yes) ")
            Button("No") {
                wrong += 1
                wrongAnswer = true
            }
            Button("Yes") {
                level = 10
                wrongAnswer = false
            }
            Button("SKIP") {
                wrongAnswer = false
                skip += 1
                level = 10
            }
        }
    }
    private var question10: some View {
        VStack {
            Text("Debug test (Yes) ")
            Button("No") {
                wrong += 1
                wrongAnswer = true
            }
            Button("Yes") {
                level = 100
                wrongAnswer = false
            }
            Button("SKIP") {
                wrongAnswer = false
                skip += 1
                level = 100
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
            
            Text("SKIPS:\(skip)")
            Text("Wrong awnswers:\(wrong)")
            Text("")
             
            Button("Note")    {

                if calculated == false {
                    note_temp = level_nummer * 100
                    
                    temp = wrong + skip
                    calculated = true
                    
                    if temp > level_nummer {
                        temp = level_nummer
                        
                    }
                    
                    note_nummer = temp 
                    note_nummer *= 100
                    note_temp -= note_nummer
                    
                    note_temp /= level_nummer
                    
                    if note_temp >= 95 {
                        
                        note = 15
                    
                    }
                    else if note_temp >= 90 {
                        note = 14
                    }
                    else if note_temp >= 85 {
                        note = 13
                    }                    
                    else if note_temp >= 80 {
                        note = 12
                    }
                    else if note_temp >= 75 {
                        note = 11
                    }
                    else if note_temp >= 70 {
                        note = 10
                    }
                    else if note_temp >= 65 {
                        note = 09
                    }
                    else if note_temp >= 60 {
                        note = 08
                    }
                    else if note_temp >= 55 {
                        note = 07
                    }
                    else if note_temp >= 50 {
                        note = 06
                    }
                    else if note_temp >= 45 {
                        note = 05
                    }
                    else if note_temp >= 40 {
                        note = 04
                    }
                    else if note_temp >= 33 {
                        note = 03
                    }
                    else if note_temp >= 27 {
                        note = 02
                    }
                    else if note_temp >= 20 {
                        note = 01
                    }
                    else if note_temp >= 0 {
                        note = 00
                    }
                    
                }
                
            }
            
            
            Text("Note:\(note)")
            
            Text("Debug:\(note_nummer) \(note_temp)")
            
        }
    }
    

}



struct ContentView_Previews: PreviewProvider {
    static var previews: some View {
        ContentView()
    }
}
