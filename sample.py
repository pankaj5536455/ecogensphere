import PyPDF2
from nltk.tokenize import word_tokenize
from nltk.corpus import stopwords
from collections import Counter
#from wordcloud import WordCloud
import matplotlib.pyplot as plt

def read_pdf(pdf_file):
    text = ""
    with open(pdf_file, "rb") as file:
        reader = PyPDF2.PdfFileReader(file)
        num_pages = reader.numPages
        for page_num in range(num_pages):
            page = reader.getPage(page_num)
            text += page.extractText()
    return text

def preprocess_text(text):
    # Tokenize the text into words
    words = word_tokenize(text)
    
    # Convert to lowercase
    words = [word.lower() for word in words]
    
    # Remove stopwords
    stop_words = set(stopwords.words("english"))
    words = [word for word in words if word not in stop_words]
    
    # Remove punctuation and non-alphanumeric characters
    words = [word for word in words if word.isalnum()]
    
    return words

def extract_keywords(text, num_keywords=10):
    # Preprocess the text
    words = preprocess_text(text)
    
    # Calculate word frequency
    word_freq = Counter(words)
    
    # Get the top N keywords
    top_keywords = word_freq.most_common(num_keywords)
    
    return top_keywords
"""
def generate_wordcloud(text):
    # Generate the word cloud
    wordcloud = WordCloud(width=800, height=400, background_color='white').generate(text)
    
    # Display the word cloud
    plt.figure(figsize=(10, 5))
    plt.imshow(wordcloud, interpolation='bilinear')
    plt.axis('off')
    plt.show()
"""
if __name__ == "__main__":
    # Path to the PDF file
    pdf_file = "crop cultiation guide.pdf"
    
    # Read the PDF file
    pdf_text = read_pdf(pdf_file)
    
    # Extract keywords
    keywords = extract_keywords(pdf_text)
    
    print("Top keywords:")
    for keyword, freq in keywords:
        print(f"{keyword}: {freq}")
    
    # Generate word cloud
    # generate_wordcloud(pdf_text)
